<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class Blogs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blogs;
    public $header;
    public function __construct($blogs=[], $header='Other Articles')
    {
	$this->blogs = $blogs;
	$this->header = $header;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sections.blogs');
    }
}
