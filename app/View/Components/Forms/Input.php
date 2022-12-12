<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $type;
    public $class;
    public $value;
    public $placeholder;
    public $prepend;
    public $append;
    public $formGroup;
    public $attr;
    public function __construct($id=null, $type="text", $class="", $value=null, $placeholder="", $prepend=null, $append=null, $formGroup=false, $attr=[])

    {
        $this->id = $id;
	$this->type = $type;
	$this->class = $class;
	$this->value = $value;
	$this->placeholder = $placeholder;
	$this->prepend = $prepend;
	$this->append = $append;
	$this->formGroup = $formGroup;
	$this->attr = $attr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
