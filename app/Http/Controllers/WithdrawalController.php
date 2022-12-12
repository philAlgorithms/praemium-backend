<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Requests\UpdateWithdrawalRequest;
use App\Models\Client;
use App\Models\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends BaseController
{
    public function submit(Request $request)
    {
        $input = $request->all();
        $client = Client::find(auth()->user()->id);
        $validator = Validator::make($input, [
            'amount' => 'required|numeric',
            //'receiver_address' => 'required|string',
            'crypto_currency' => 'required|numeric',
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }else if($request->amount > $client->withdrawable_amount){
            return $this->sendError("Forbidden","Insufficient balance. Amount should be lesser than withdrawable amount", 403, "integrity");
        }

        $withdrawals = $client->withdrawalTransactionHasStatus(env('STATUS_PENDING'));
        
        if($withdrawals->get()->count() > 0)
        {
            return $this->sendError(error:'A pending transaction already exists', errorMessages:'Wait for the transaction to be approved or contact Customer support', code:400);
        }

        $amount = $request->amount;
        $amount = $amount > 0 ? $amount * -1 : $amount;
        $coin = Coin::find($request->cryptocurrency);
        $receiver_address = $client->wallets->firstWhere('coin_id', '=', $request->crypto_currency)->address;

        $transaction = $client->submitWithdrawal(coin: $coin, receiver_address: $receiver_address, amount: $amount);

        // $notification = [
        //     'title'=>'Withdrawal Request',
        //     'admin_title'=>'Withdrawal Request',
        //     'text'=>'Request to withdraw '.dollar(abs($amount)).' has been sent',
        //     'admin_text'=>$client->fullname().' wants to withdraw '.dollar($amount),
        //     'url'=>'/withdrawals/'.$withdrawal->uuid,
        //     'admin_url'=>'/withdrawals/manage/'.$withdrawal->uuid,
        //     'icon'=>'fas fa-piggy-bank',
        //     'color'=>'secondary'
        // ];
        // notify($client, $notification);
        // foreach(Admin::all() as $admin){
        //     notify($admin, $notification);
        // }
        // //Send Mail
        // $email_param = [
        //     'name'=>$client->fullname(),
        //     'amount'=>dollar($amount),
        //     'link'=>URL::to('withdrawals/view/'.$withdrawal->uuid),
        //     'coin'=>$withdrawal->coin->trivial_name,
        //     'address'=>$withdrawal->receiver_address
        // ];
        // $admin_emails = newArray(Admin::all(), 'email');
        // email(param:$email_param, subject: $withdrawal->coin->trival_name.' Withdrawal', view:'emails.withdrawals.submit', target:$client->email , bcc:$admin_emails);

        return $this->sendResponse($transaction, 'Withdrawal saved succesfully');
    }
}
