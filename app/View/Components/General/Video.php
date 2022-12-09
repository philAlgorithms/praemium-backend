<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class Video extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $text;
    public $link;
    public $length;
    public $thumbnail;
    public function __construct($title, $text, $link, $thumbnail, $length='')
    {
	$this->title = $title;
	$this->text = $text;
	$this->link = $link;
	$this->thumbnail = $thumbnail;
	$this->length = $length;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.video');
    }
}
