<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Subscription extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $subscription;
    public $class;
    public function __construct($subscription, $class='')
    {
        $this->subscription = $subscription;
    	$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.subscription');
    }
}
