<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Coin;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class WalletController extends BaseController
{
    public function add()
    {
        $validator = Validator::make(request()->toArray(), [
            'coin_id' => ['required', 'numeric', 'exists:coins,id'],
            'wallet_address' => ['required', 'string'],
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }
        $user = User::find(auth()->user()->id);

        $similar_coins = $user->wallets()->whereRelation('coin', 'id', request('coin_id'))->get();

        if($similar_coins->count() > 0)
        {
            $coin = Coin::firstWhere('id', request('coin_id'));
            return $this->sendError(error:'Wallet exists', errorMessages:'You already have a wallet address set for'.$coin->display_name, code:404, type: "integrity");
        }

        $wallet = $user->wallets()->create([
            'coin_id' => request('coin_id'),
            'address' => request('wallet_address')
        ]);

        return $this->sendResponse($wallet, "Wallet created", 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();

        return $this->sendResponse([], "Wallet deleted", 202);
    }
}
