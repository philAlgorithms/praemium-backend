<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class TransferInvoice extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $transfer;
    public $class;
    public function __construct($transfer, $class='')
    {
        $this->transfer = $transfer;
    	$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.transfer-invoice');
    }
}
