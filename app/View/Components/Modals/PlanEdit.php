<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class PlanEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $plan;
    public function __construct($plan)
    {
        $this->plan = $plan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.plan-edit');
    }
}
