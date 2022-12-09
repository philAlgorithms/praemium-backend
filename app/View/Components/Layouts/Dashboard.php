<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bodyClass;
    public $scripts;
    public $styles;
    public function __construct($bodyClass='g-sidenav-show  bg-gray-100',$scripts=[], $styles=[])
    {
	$this->bodyClass = $bodyClass;
	$this->styles = $styles;
	$this->scripts = $scripts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.dashboard');
    }
}
