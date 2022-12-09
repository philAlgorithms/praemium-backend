<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class CoinStat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $coinId;
    public $prefCoinId;
    public $theme;
    public function __construct($class='col-12', $coinId=859, $prefCoinId=1505, $theme='light')
    {
        $this->class = $class;
    	$this->coinId = $coinId;
	$this->prefCoinId = $prefCoinId;
	$this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.coin-stat');
    }
}
