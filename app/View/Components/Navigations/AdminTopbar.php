<?php

namespace App\View\Components\Navigations;

use Illuminate\View\Component;

class AdminTopbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $default_class = 'navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky';

    public $class;
    public $colorState;
    public function __construct($class='navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky', $colorState='dark')
    {
	$this->class = $class;
	$this->colorState = $colorState;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigations.admin-topbar');
    }
}
