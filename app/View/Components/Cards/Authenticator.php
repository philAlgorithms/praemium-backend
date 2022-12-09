<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Authenticator extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $class;
    public $image;
    public $secret;

    public function __construct($image, $secret, $class='')
    {
    	$this->class = $class;
    	$this->image = $image;
	$this->secret = $secret;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.authenticator');
    }
}
