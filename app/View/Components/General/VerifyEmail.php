<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class VerifyEmail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $email;
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.verify-email');
    }
}
