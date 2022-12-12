<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class Wallet extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $coin;
    public $address;
    public function __construct($coin, $address)
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
        return view('components.general.wallet');
    }
}
