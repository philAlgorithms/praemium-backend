<?php

namespace App\View\Components\Forms\Button;

use Illuminate\View\Component;

class Spinning extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $class;
    public $text;
    public $spinText;
    public $attr;

    public function __construct($id='btn', $class='btn btn-lg btn-primary w-100 mt-4 mb-0', $text='Submit', $spinText='Please Wait...', $attr=[])
    {
	$this->id = $id;
	$this->class = $class;
	$this->text = $text;
	$this->spinText = $spinText;
	$this->attr = $attr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button.spinning');
    }
}
