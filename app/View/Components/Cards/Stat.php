<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Stat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $text; public $amount; public $increment; public $icon; public $class;
    public function __construct($text='', $amount='', $increment='', $icon='', $class='col-xl-3 col-sm-6 mb-xl-0 mb-4')
    {
	$this->text = $text;
	$this->amount = $amount;
	$this->increment = $increment;
	$this->icon = $icon;
	$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.stat');
    }
}
