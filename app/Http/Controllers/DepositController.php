<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use App\Models\Client;
use App\Models\Coin;
use App\Models\Plan;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class DepositController extends BaseController
{
    public function init()
    {
        $validator1 = Validator::make(request()->toArray(), [
            'plan' => ['required', 'numeric', 'exists:plans,id'],
            'coin' => ['required', 'string'],
        ]);

        if($validator1->fails()){
            return $this->sendError('Error validation', $validator1->errors());
        }

        $plan = Plan::find(request('plan'));

        $validator2 = Validator::make(request()->toArray(), [
            'amount' => ['required', 'numeric', 'min:'.$plan->min, 'max:'.$plan->max],
        ]);

        if($validator2->fails()){
            return $this->sendError('Error validation', $validator2->errors());
        }

        $coin = Coin::find(request('coin'));

        $link = URL::asset('/account/deposit?coin='.$coin->id.'&amount='.request('amount').'&plan='.request('plan'));	
        return $this->sendResponse($link, 'deposit link generated');
    }

    public function deposit()
    {
        $validator1 = Validator::make(request()->toArray(), [
            'plan_id' => ['required', 'numeric', 'exists:plans,id'],
        ]);

        if($validator1->fails()){
            return $this->sendError('Error validation', $validator1->errors());
        }

        $plan = Plan::find(request('plan_id'));

        $validator2 = Validator::make(request()->toArray(), [
            'amount' => ['required', 'numeric', 'min:'.$plan->min, 'max:'.$plan->max],
            'receiver_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'sender_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'tx' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')]
        ]);
        if($validator2->fails()){
            return $this->sendError('Error validation', $validator2->errors());
        }
        $user = Client::find(auth()->user()->id);
        $transaction = $user->subscribe(plan: $plan, amount: request('amount'));

        $deposit = Transaction::find($transaction->id)->transactionable;

        if(is_null($deposit))
        {
            return $this->sendError(error:'Transaction not found', errorMessages:'Transaction does not exist', code:404);
        }

        $approved_deposit = $deposit->completeSubscription(receiver_address: request('receiver_address'), sender_address: request('sender_address'), tx: request('tx'));

        return $this->sendResponse($approved_deposit, "Subscription successful");
    }
    public function subscribe()
    {
        $validator1 = Validator::make(request()->toArray(), [
            'plan_id' => ['required', 'numeric', 'exists:plans,id'],
        ]);

        if($validator1->fails()){
            return $this->sendError('Error validation', $validator1->errors());
        }

        $plan = Plan::find(request('plan_id'));

        $validator2 = Validator::make(request()->toArray(), [
            'amount' => ['required', 'numeric', 'min:'.$plan->min, 'max:'.$plan->max],
        ]);

        if($validator2->fails()){
            return $this->sendError('Error validation', $validator2->errors());
        }

        $user = Client::find(auth()->user()->id);

        $deposits = $user->depositTransactionHasStatus(env('STATUS_PENDING'));
        
        if($deposits->get()->count() > 0)
        {
            return $this->sendError(error:'An unfinished transaction already exists', errorMessages:'Continue with your last transaction or delete all of them!', code:400);
        }

        // $deposit = Deposit::create(['plan_id' => request('plan_id')]);

        $transaction = $user->subscribe(plan: $plan, amount: request('amount'));
        
        //session()->put(env('SUBSCRIPTION_SESSION_NAME'), $transaction->id);

        return $this->sendResponse($transaction, "Subscription succesful", 201);
    }

    public function completeSubscription()
    {
        $validator = Validator::make(request()->toArray(), [
            'plan_id' => ['required', 'numeric', 'exists:plans,id'],
            'deposit_id' => ['required', 'exists:deposits,id'],
            'receiver_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'sender_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'tx' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')]
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }
        
        $deposit = Deposit::find(request('deposit_id'));

        if(is_null($deposit))
        {
            return $this->sendError(error:'Transaction not found', errorMessages:'Transaction does not exist', code:404);
        }

        $approved_deposit = $deposit->completeSubscription(receiver_address: request('receiver_address'), sender_address: request('sender_address'), tx: request('tx'));

        return $this->sendResponse($approved_deposit, "Subscription successful");
    }

    public function approve()
    {
        $validator = Validator::make(request()->toArray(), [
            'deposit_id' => ['required', 'exists:deposits,id'],
            'receiver_address' => ['required', 'string', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'sender_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'tx' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')]
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $deposit = Deposit::find(request('deposit_id'));

        if(is_null($deposit))
        {
            return $this->sendError(error:'Transaction not found', errorMessages:'Transaction does not exist', code:404);
        }
        
        $approved_deposit = $deposit->approve(receiver_address: request('receiver_address'), sender_address: request('sender_address'), tx: request('tx'));

        return $this->sendResponse($approved_deposit, "client Registration successful");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepositRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepositRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepositRequest  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepositRequest $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
