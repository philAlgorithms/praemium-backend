<?php

use App\Models\{Client, Coin, User, Wallet};
use App\Notifications\General;
use Illuminate\Support\Facades\URL;

function appName(){
    return 'Praemium';
}

function is_auth()
{
    return auth()->user() !== null;
}

function is_admin()
{
	if(!is_auth()) return 0;
    return User::find(auth()->user()->id)->hasRole('admin');
}

function is_client()
{
	if(!is_auth()) return 0;
    return User::find(auth()->user()->id)->hasRole('client');
}

function clients()
{
	return User::role('client')->get();
}

function admin_wallets()
{
    return Wallet::whereRelation('user', function($que){
        $que->whereRelation('roles', function($q){
            $q->where('name', 'admin');
        });
    })->get();
}
function acceptedCoins()
{ 
    return Coin::whereRelation('wallets', function($query){
        $query->whereRelation('user', function($que){
            $que->whereRelation('roles', function($q){
                $q->where('name', 'admin');
            });
        });
    })->get();
}

function n_char($string, $limit=1){
    return mb_substr($string, 0, $limit);
}
function check_regular_plural($plural_word, $quantity){
    return $quantity == 1 ? rtrim($plural_word, "s ") : $plural_word;
}

function check_singularity($string){
    $first = n_char($string, 2);
    return $first == "1 " ? substr($string, 2) : $string;
}

function dp($number, $places=2){
    return (Float)number_format($number, $places, '.', ',');
}

function amount_from_percent($amount, $percentage){
    return ($amount * $percentage)/100;
}

function percentage($standard, $reference){
    if($standard == 0) return dp(100);
    return dp((($reference - $standard)/$standard)*100);
}

function prefix($word){
    $vowelArry = array('a','e','i','o','u'); 
    $prefix = in_array(strtolower(substr($word ,0,1)),$vowelArry)? "an" : "a"; 
    return $updated_word = $prefix." ".strtolower($word);
}

function randomString($length=8) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) { $n = rand(0, $alphaLength); $pass[] = $alphabet[$n]; } return implode($pass);
    //turn the array into a string
}

function getNextDateSeconds($duration, $current='now'){
    $seconds_till_now = strtotime('now');
    $seconds_till_current = strtotime($current);
    $seconds_till_duration = strtotime($duration);

    $seconds_between_duration = $seconds_till_duration - $seconds_till_now;
    return $seconds_till_current + $seconds_between_duration;
}

function getNextDate($duration, $current='now', $format='Y/m/d H:i:s'){
    $seconds = getNextDateSeconds($duration, $current);
    $miliseconds = $seconds * 1000;
    return date($format, $seconds);
}

function variable($key)
{
    return $key;
}

function dollar($number){
    $sigil = '$';
    if($number <0){
	$number = $number*-1;
	$sigil = '-$';
    }
    return $sigil.number_format($number, 2, '.', ',');
}

function token($amount, $coin){
    return dp($amount, 6).' '.$coin->code;
}

function blockchain($hash, $code){
	$blockchain_assets = ['btc','eth','bch'];
	$blockchair_assets = ['btc','eth','bch', 'ltc', 'bnb','doge','etc'];

	if(in_array($code, $blockchain_assets)){
	    return "https://www.blockchain.com/".$code."/tx/".$hash;
	}else if(in_array($code, $blockchair_assets)){
	    return "https://www.blockchain.com/".$code."/tx/".$hash;
	}
}

function capState($cap){
    switch(mb_substr($cap, 0, 1)){
    case '+':
	return 'success';
	break;
    case '-':
	return 'danger';
	break;
    default:
	return 'primary';
    }
}

function client()
{
    return Client::find(auth()->user()->id);
}

function checkFloat($number){
    return $number/1;
}

function noSigil($number){
    return substr(dollar($number), 1);
}

// DATE HELPERS START
function showDate($datetime){
    $dt = new \DateTime($datetime);
    return $dt->format('d-m-Y');;
}

function showTime($datetime){
    $dt = new \DateTime($datetime);
    return $dt->format('h:i A');
}

function getDates($daysToAdd) { 
    $days   = [];
    $period = new \DatePeriod(
	new \DateTime(), // Start date of the period
	new \DateInterval('P1D'), // Define the intervals as Periods of 1 Day
	$daysToAdd // Apply the interval 6 times on top of the starting date
    );

    foreach ($period as $day){
	$days[] = array(
	    "dateTime"=> $day->format('Y-m-d H:i:s'),
	    "time"=> $day->format('A'),
	    "day"=> $day->format('l'),
	    "date"=>$day->format('d'),
	    "month"=> $day->format('F')
	);
    }
    return $days;
} 

function getDay($datetime){
    $days = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $dayofweek = date('w', strtotime($datetime));
    return $days[$dayofweek];
}

function getMonth($datetime){
    $months = array(
	'01'=>'January',
	'02'=>'February', 
	'03'=>'March', 
	'04'=>'April',
	'05'=>'May',
	'06'=>'June',
	'07'=>'July',
	'08'=>'August',
	'09'=>'September',
	'10'=>'October',
	'11'=>'November',
	'12'=>'December'
    );
    $monthKey = date('m', strtotime($datetime));
    return $months[$monthKey];
}

function readDate($datetime){
    $day = getDay($datetime);
    $month =  getMonth($datetime);
    $date =  date('d', strtotime($datetime));

    return  substr($day,0,3).', '.substr($month,0,3).' '.$date;
}

function readFullDate($datetime){
    $month = getMonth($datetime);
    $date =  date('d', strtotime($datetime));
    $year =  date('Y', strtotime($datetime));

    return substr($month,0,3).' '.$date.', '.$year;
}

function readMonthYear($datetime){
    $month =  getMonth($datetime);
    $year =  date('Y', strtotime($datetime));

    return substr($month,0,3).', '.$year;
}

function getYear($datetime){
    return  date('Y', strtotime($datetime));
}

function readFullTime($datetime, $at=' '){
    return readFullDate($datetime).' '.$at.' '.showTime($datetime);
}

function unix($datetime){
    return strtotime($datetime);
}

function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}

function checkDatePast($datetime) {
    $date = new \Datetime($datetime);
    $now = new \DateTime();

    return $date < $now;
}

/*
 * This function converts a unix timestamp to 'some moments ago' format 
 * Set the $full variable to true if you want a complete description of the timestamp*/
function time_elapsed_string($datetime, $full = false) {
    $now = new \Datetime(gmdate("Y-m-d\TH:i:s\Z"));
    $ago = new \Datetime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
	'y' => 'year',
	'm' => 'month',
	'w' => 'week',
	'd' => 'day',
	'h' => 'hour',
	'i' => 'minute',
	's' => 'second',
    );
    foreach ($string as $k => &$v) {
	if ($diff->$k) {
	    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	} else {
	    unset($string[$k]);
	}
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
// DATE HELPERS END


function cryptoSvg($code){
    return URL::asset('dashboard/vendors/cryptofont-1.3.0/SVG/'.$code.'.svg');
}

function cryptoSvgColor($code){
    return URL::asset('dashboard/vendors/cryptofont-1.3.0/SVG/img/'.$code.'.svg');
}

function hasCoin(string $code, $wallets){
	$response = 0;

	foreach($wallets as $wallet){
	    $response = $wallet->coin->code === $code ? 1 : $response;
	}

	return $response;
}

function firstInstance(string $coin_code, $wallets){
	if(!hasCoin($coin_code, $wallets))
	   return null;

	foreach($wallets as $wallet){
	    if($wallet->coin->code === $coin_code)
		return $wallet;
	}
}

function firstWallet($wallets, $coin_code=null){
	$first_wallet;
	foreach($wallets as $wallet){
	    $first_wallet = $wallet;  
	    break;
	}
	if($coin_code === null)
	    return $first_wallet;
	else if($coin_code !== null)
	    return  hasCoin($coin_code, $wallets) ? 
	    firstInstance($coin_code, $wallets) : 
	    (hasCoin('btc', $wallets) ? 
	    	firstInstance('btc', $wallets) : 
	    	$first_wallet);
}

function firstCoinInstance(string $coin_code, $coins){
	if(!containsCoin($coin_code, $coins))
	   return null;

	foreach($coins as $coin){
	    if($coin->code === $coin_code)
		return $coin;
	}
}

function containsCoin(string $code, $coins){
	$response = 0;

	foreach($coins as $coin){
	    $response = $coin->code === $code ? 1 : $response;
	}

	return $response;
}

function firstCoin($coins, $coin_code=null){
	$first_coin;
	foreach($coins as $coin){
	    $first_coin = $coin;  
	    break;
	}
	if($coin_code === null)
	    return $first_coin;
	else if($coin_code !== null)
	    return  containsCoin($coin_code, $coins) ? 
	    firstCoinInstance($coin_code, $coins) : 
	    (containsCoin('btc', $coins) ? 
	    	firstCoinInstance('btc', $coins) : 
	    	$first_coin);
}

function newArray($oldObject, $prop){
    $newArray = array();
    foreach($oldObject as $oldObj){
  $newArray[] = $oldObj->$prop;
    }
    return $newArray;
}

function getPrices($wallets=null){
	if($wallets === null){
	    $wallets = admin_wallets();
	}
	$coins = acceptedCoins($wallets);
	$coin_ids = newArray($wallets, 'coibn_id'); 
	$coins = Coin::wherein('id', $coin_ids)->get();

	$coin_name_arrays = [];
	foreach($coins as $coin){
	    array_push($coin_name_arrays, $coin->coinlib_name);
	}
	
	$coin_names = implode(',',$coin_name_arrays);

	$client = new Codenixsv\CoinGeckoApi\CoinGeckoClient();
	$data = $client->simple()->getPrice($coin_names, 'usd');
	return $data;
}

function getPricesByCoins($coins){
	$coin_name_arrays = [];
	foreach($coins as $coin){
	    array_push($coin_name_arrays, $coin->coinlib_name);
	}
	
	$coin_names = implode(',',$coin_name_arrays);

	$client = new Codenixsv\CoinGeckoApi\CoinGeckoClient();
	$data = $client->simple()->getPrice($coin_names, 'usd');
	return $data;
}

function admins()
{
	return User::role('admin');
}
function admin_emails()
{
	return admins()->pluck('email')->toArray();
}

function notify($user, $notification){
    return User::find($user->id)->notify(new General($notification));
}