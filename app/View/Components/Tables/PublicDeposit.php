<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class PublicDeposit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $deposits;
    public function __construct($class='col-md-6', $deposits=[])
    {
	$this->class = $class;
        $this->deposits = $deposits;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.public-deposit');
    }
}
