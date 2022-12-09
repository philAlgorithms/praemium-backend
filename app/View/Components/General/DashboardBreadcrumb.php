<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class DashboardBreadcrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $pageName;
    public $pageTitle;
    public $color;
    public function __construct($pageName='', $pageTitle='',$color='')
    {
	$this->pageName = $pageName;
	$this->pageTitle = $pageTitle;
	$this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.dashboard-breadcrumb');
    }
}
