<?php

use App\Models\{Client, User};

function appName(){
    return 'Praemium';
}

function is_auth()
{
    return auth()->user() !== null;
}

function is_admin()
{
    return User::find(auth()->user()->id)->hasRole('admin');
}

function is_client()
{
    return User::find(auth()->user()->id)->hasRole('client');
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