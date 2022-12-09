<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use App\Models\Client;
use App\Models\Plan;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;

class DepositController extends BaseController
{
    public function subscribe()
    {
        request()->validate([
            'plan_id' => ['required', 'numeric', 'exists:plans,id'],
        ]);

        $plan = Plan::find(request('plan_id'));

        request()->validate([
            'amount' => ['required', 'numeric', 'min:'.$plan->min, 'max:'.$plan->max],
        ]);
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
        request()->validate([
            'deposit_id' => ['required', 'exists:deposits,id'],
            'receiver_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'sender_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'tx' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')]
        ]);

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
        request()->validate([
            'deposit_id' => ['required', 'exists:deposits,id'],
            'receiver_address' => ['required', 'string', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'sender_address' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')],
            'tx' => ['string', 'nullable', 'min:'.env('MINIMUM_WALLET_ADDRESS_LENGHT')]
        ]);

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
