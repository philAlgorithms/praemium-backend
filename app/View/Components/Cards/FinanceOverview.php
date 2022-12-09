<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class FinanceOverview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $finance;
    public function __construct($finance)
    {
        $this->finance = $finance;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.finance-overview');
    }
}
