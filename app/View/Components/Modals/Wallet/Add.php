<?php

namespace App\View\Components\Modals\Wallet;

use Illuminate\View\Component;

class Add extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $url;
    public function __construct($url='/account/wallets/user/add')
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.wallet.add');
    }
}
