<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Http\Requests\StoreBonusRequest;
use App\Http\Requests\UpdateBonusRequest;
use App\Models\Client;
use App\Models\Plan;
use Illuminate\Support\Facades\Validator;

class BonusController extends BaseController
{
    public function grant()
    {
        $validator = Validator::make(request()->toArray(), [
            'plan' => ['required', 'exists:plans,id'],
            'client' => ['required', 'exists:users,id'],
            'amount' => ['required', 'numeric', 'min:0']
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $plan = Plan::find(request('plan'));
        $client = Client::find(request('client'));
        
        $bonus = $client->grantBonus(amount: request('amount'), plan: $plan);

        // $email_param = [
        //     'name'=>$client->name,
        //     'amount'=>$withdrawal->transaction->amount.' USD',
        // ];

        // $client->send_mail(subject: "Withdrawal Succesful", view:"emails.withdrawals.success", param:$email_param, bcc: admin_emails());
        
        return $this->sendResponse($bonus, "Bonus giveaway successful");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreBonusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBonusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function show(Bonus $bonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bonus $bonus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBonusRequest  $request
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBonusRequest $request, Bonus $bonus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bonus $bonus)
    {
        //
    }
}
