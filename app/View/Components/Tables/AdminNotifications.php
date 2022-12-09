<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class AdminNotifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $notifications;
    public function __construct($notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.admin-notifications');
    }
}
