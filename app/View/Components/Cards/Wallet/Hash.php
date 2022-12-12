<?php

namespace App\View\Components\Cards\Wallet;

use Illuminate\View\Component;

class Hash extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $class;
    public $amount;
    public $address;
    public $coin;
    public $plan;

    public function __construct($amount, $address, $coin, $plan, $class='col-12 col-md-6')
    {
        $this->class = $class;
    	$this->amount = $amount;
	$this->address = $address;
	$this->coin = $coin;
	$this->plan = $plan;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.wallet.hash');
    }
}
