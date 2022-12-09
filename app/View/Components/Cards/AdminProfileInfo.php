<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class AdminProfileInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $class;
    public $admin;
    public function __construct($admin, $class='')
    {
	$this->admin = $admin;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.admin-profile-info');
    }
}
