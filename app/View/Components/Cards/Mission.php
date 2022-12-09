<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Mission extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $text;
    public $icon;
    public $color;
    public function __construct($title, $text='', $icon='fa fa-check', $color="primary")
    {
	$this->title = $title;
	$this->text = $text;
	$this->icon = $icon;
	$this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.mission');
    }
}
