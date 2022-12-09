<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class DepositDetails extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $deposit;
    public function __construct($deposit)
    {
        $this->deposit = $deposit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.deposit-details');
    }
}
