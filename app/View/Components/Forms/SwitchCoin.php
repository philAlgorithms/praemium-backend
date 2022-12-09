<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SwitchCoin extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $coins;
    public $prices;
    public function __construct($coins=[], $prices=[])
    {
        $this->coins = $coins;
    	$this->prices = $prices;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.switch-coin');
    }
}
