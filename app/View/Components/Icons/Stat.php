<?php

namespace App\View\Components\Icons;

use Illuminate\View\Component;

class Stat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $icon;
    public function __construct($class, $icon)
    {
	$this->class = $class;
	$this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icons.stat');
    }
}
