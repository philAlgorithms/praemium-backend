<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Requests\UpdateWithdrawalRequest;
use App\Models\Client;
use App\Models\Coin;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends BaseController
{
    public function submit(Request $request)
    {
        $input = $request->all();
        $client = Client::find(auth()->user()->id);
        $validator = Validator::make($input, [
            'amount' => ['required', 'numeric', 'min:'.env('MIN_WITHDRAWAL')],
            'plan' => ['required', 'numeric'],
            //'receiver_address' => 'required|string',
            'crypto_currency' => ['required', 'numeric'],
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }else if($request->amount > $client->withdrawable_amount){
            return $this->sendError("Forbidden","Insufficient balance. Amount should be lesser than withdrawable amount", 403, "integrity");
        }

        $withdrawals = $client->withdrawalTransactionHasStatus(env('STATUS_PENDING'));
        
        if($withdrawals->get()->count() > 0)
        {
            return $this->sendError('Request Declined', 'You have a pending withdrawal. Wait for the transaction to be approved or contact Customer support', 400, "integrity");
        }

        $amount = $request->amount;
        $coin = Coin::find($request->crypto_currency);
        $plan = Plan::find($request->plan);
        $withdrawable_plan_earning = $plan->activeEarning($client);

        if(abs($amount) > abs($withdrawable_plan_earning))
        {
            return $this->sendError('Insufficient Funds', 'Amount entered is greater than the earnings from this plan', 400, "integrity");
        }
        
        $receiver_address = $client->wallets->firstWhere('coin_id', '=', $request->crypto_currency)->address;
        $transaction = $client->submitWithdrawal(plan: $plan, coin: $coin, receiver_address: $receiver_address, amount: $amount);
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
        $email_param = [
            'name'=>$client->name,
            'amount'=>$transaction->amount.' USD',
        ];
        $client->send_mail(subject: "Request Saved", view:"emails.withdrawals.submit", param:$email_param, bcc: admin_emails());
        
        return $this->sendResponse($transaction, 'Withdrawal saved succesfully');
    }

    public function approve()
    {
        $validator = Validator::make(request()->toArray(), [
            'withdrawal_id' => ['required', 'exists:withdrawals,id'],
            'receiver_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'sender_address' => ['required', 'string', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'transaction_hash' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')]
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $withdrawal = Withdrawal::find(request('withdrawal_id'));

        if(is_null($withdrawal))
        {
            return $this->sendError(error:'Transaction not found', errorMessages:'Transaction does not exist', code:404);
        }
        
        $client = $withdrawal->transaction->client;
        $approved_withdrawal = $withdrawal->approve(receiver_address: request('receiver_address'), sender_address: request('sender_address'), tx: request('transaction_hash'));
        $email_param = [
            'name'=>$client->name,
            'amount'=>$withdrawal->transaction->amount.' USD',
        ];

        $client->send_mail(subject: "Withdrawal Succesful", view:"emails.withdrawals.success", param:$email_param, bcc: admin_emails());
        
        return $this->sendResponse($approved_withdrawal, "Withdrawal approved successful");
    }
}