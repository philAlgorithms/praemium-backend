<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class ClientSubscriptions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $plans;
    public function __construct($plans=[])
    {
        $this->plans = $plans;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.client-subscriptions');
    }
}
