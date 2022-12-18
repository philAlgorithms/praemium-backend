<?php

namespace App\View\Components\Tables\Plan;

use Illuminate\View\Component;

class Earnings extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $earnings;
    public function __construct($earnings)
    {
        $this->earnings = $earnings;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.plan.earnings');
    }
}
