<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class CoinTicker extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $light;
    public function __construct($light=true)
    {
        $this->light = $light;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.coin-ticker');
    }
}
