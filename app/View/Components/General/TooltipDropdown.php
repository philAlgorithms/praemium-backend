<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class TooltipDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $class;
    public $icon;
    public $title;
    public $dropdown;
    public $iconColor;
    public $class2;
    public function __construct($class='', $icon='fas fa-cog', $title='', $dropdown=true, $iconColor='white', $class2='')
    {
	$this->class = $class;
	$this->icon = $icon;
	$this->title = $title;
	$this->dropdown = $dropdown;
	$this->iconColor = $iconColor;
	$this->class2 = $class2;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.tooltip-dropdown');
    }
}
