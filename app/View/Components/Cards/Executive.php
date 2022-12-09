<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Executive extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $role;
    public $image;
    public $description;
    public function __construct($name, $role, $image='teller.jpg',$description='')
    {
	$this->name = $name;
	$this->role = $role;
	$this->image = $image;
	$this->description= $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.executive');
    }
}
