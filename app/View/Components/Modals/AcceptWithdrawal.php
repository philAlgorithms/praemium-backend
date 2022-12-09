<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class AcceptWithdrawal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $withdrawal;
    public function __construct($withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.accept-withdrawal');
    }
}
