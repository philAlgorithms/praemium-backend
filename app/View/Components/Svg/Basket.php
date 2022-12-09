<?php

namespace App\View\Components\Svg;

use Illuminate\View\Component;

class Basket extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $color;
    public $size;
    public function __construct($color='', $size=12)
    {
	$this->color = $color;
	$this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.svg.basket');
    }
}
