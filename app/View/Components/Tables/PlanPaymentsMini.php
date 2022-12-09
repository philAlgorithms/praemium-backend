<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class PlanPaymentsMini extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;	
    public $payments;
    public function __construct($class="col-12 col-lg-10", $payments=[])
    {
	$this->class = $class;
        $this->payments = $payments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.plan-payments-mini');
    }
}
