<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $sectionClass;
    public $rowClass;
    public function __construct($sectionClass='mb-5 py-5', $rowClass='')
    {
	$this->sectionClass = $sectionClass;
	$this->rowClass = $rowClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.section');
    }
}
