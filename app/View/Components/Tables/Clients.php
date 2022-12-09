<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Clients extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $clients;
    public function __construct($clients=[])
    {
        $this->clients = $clients;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.clients');
    }
}
