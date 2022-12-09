<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class PublicWithdrawal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $withdrawals;
    public function __construct($class='col-md-6', $withdrawals=[])
    {
	$this->class = $class;
        $this->withdrawals = $withdrawals;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.public-withdrawal');
    }
}
