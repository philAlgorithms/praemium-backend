<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class AdminWithdrawals extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $withdrawals;
    public function __construct($withdrawals=[])
    {
        $this->withdrawals = $withdrawals;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.admin-withdrawals');
    }
}
