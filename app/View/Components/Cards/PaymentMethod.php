<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class PaymentMethod extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $wallets;
    public $coins;
    public function __construct($wallets, $coins, $class='')
    {
        $this->class = $class;
	$this->wallets = $wallets;
	$this->coins = $coins;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.payment-method');
    }
}
