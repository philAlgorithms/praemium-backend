<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class TooltipElementSvg extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $text;
    public $link;
    public function __construct($text='',$link="javascript:;")
    {
	$this->text = $text;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.tooltip-element-svg');
    }
}
