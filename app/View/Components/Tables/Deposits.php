<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Deposits extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $deposits;
    public function __construct($deposits=[])
    {
        $this->deposits = $deposits;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.deposits');
    }
}
