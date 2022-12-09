<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class Deposit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $wallets;
    public $class;
    public function __construct($wallets, $class='')
    {
	$this->wallets = $wallets;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.deposit');
    }
}
