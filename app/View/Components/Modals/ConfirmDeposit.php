<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class ConfirmDeposit extends Component
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
        return view('components.modals.confirm-deposit');
    }
}
