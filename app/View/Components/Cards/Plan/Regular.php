<?php

namespace App\View\Components\Cards\Plan;

use Illuminate\View\Component;

class Regular extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $plan;
    public $class;
    public $color;
    public function __construct($plan, $class='col-md-6 mb-4', $color='dark')
    {
	$this->plan = $plan;
	$this->class = $class;
	$this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.plan.regular');
    }
}
