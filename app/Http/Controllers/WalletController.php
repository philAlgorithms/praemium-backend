<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\User;

class WalletController extends Controller
{
    public function add()
    {
        request()->validate([
            'coin_id' => ['required', 'numeric', 'exists:coins,id'],
            'wallet_address' => ['required', 'string'],
        ]);

        $wallet = User::find(auth()->user())->wallets()->create([
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
