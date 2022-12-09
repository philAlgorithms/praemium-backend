<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class ProfileInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $class;
    public $client;
    public function __construct($client, $class='')
    {
	$this->client = $client;
        $this->class = $class;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.profile-info');
    }
}
