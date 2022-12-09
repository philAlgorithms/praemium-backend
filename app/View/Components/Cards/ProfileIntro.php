<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class ProfileIntro extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.profile-intro');
    }
}
