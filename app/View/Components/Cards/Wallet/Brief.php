<?php

namespace App\View\Components\Cards\Wallet;

use Illuminate\View\Component;

class Brief extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $coin;
    public $address;

    public function __construct($address, $coin)
    {
	$this->coin = $coin;
	$this->address = $address;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.wallet.brief');
    }
}
