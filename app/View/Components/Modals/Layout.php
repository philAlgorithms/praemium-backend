<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $class;
    public function __construct($id=null, $class="")
    {
        $this->id = $id;
	$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.layout');
    }
}
