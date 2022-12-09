<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class CoinsStat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public function __construct($class='col-12')
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.coins-stat');
    }
}
