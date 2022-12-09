<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Subscriptions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $subscriptions;
    public function __construct($subscriptions=[])
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.subscriptions');
    }
}
