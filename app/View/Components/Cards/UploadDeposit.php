<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class UploadDeposit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $clients;
    public $adminWallets;
    public $class;
    public function __construct($clients, $adminWallets, $class='col-12')
    {
	$this->clients = $clients;
	$this->adminWallets = $adminWallets;
	$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.upload-deposit');
    }
}
