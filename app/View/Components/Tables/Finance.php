<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Finance extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $client;
    public function __construct($client, $class='col-12')
    {
	$this->client = $client;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.finance');
    }
}
