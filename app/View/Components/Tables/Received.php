<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Received extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $transfers;
    public function __construct($transfers=[])
    {
        $this->transfers = $transfers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.received');
    }
}
