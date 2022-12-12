<?php

namespace App\View\Components\Cards\Wallet;

use Illuminate\View\Component;

class Pay extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $wallet;
    public $walletPay;
    public $amount;
    public $message;

    public function __construct($wallet, $walletPay='', $amount=0, $class='col-12 col-md-6', $message='Address')
    {
        $this->class = $class;
    	$this->wallet = $wallet;
	$this->walletPay = $walletPay;
	$this->amount = $amount;
	$this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.wallet.pay');
    }
}
