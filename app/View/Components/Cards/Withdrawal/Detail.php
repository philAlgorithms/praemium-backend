<?php

namespace App\View\Components\Cards\Withdrawal;

use Illuminate\View\Component;

class Detail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $withdrawal;
    public $class;

    public function __construct($withdrawal, $class='col-lg-8 mx-auto')
    {
	$this->class = $class;
        $this->withdrawal = $withdrawal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.withdrawal.detail');
    }
}
