<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Main extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	
    public $scripts;
    public function __construct($scripts=[])
    {
        $this->scripts = $scripts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.main');
    }
}
