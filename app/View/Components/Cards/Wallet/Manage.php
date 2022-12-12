<?php

namespace App\View\Components\Cards\Wallet;

use Illuminate\View\Component;

class Manage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $isOwner;
    public $wallets;

    public function __construct($wallets=[], bool $isOwner=true)
    {
	$this->isOwner = $isOwner;
	$this->wallets = $wallets;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.wallet.manage');
    }
}
