<?php

namespace App\View\Components\General;

use Illuminate\View\Component;

class Faq extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $question;
    public $answer;
    public function __construct($id, $question, $answer)
    {
	$this->id = $id;
	$this->question = $question;
	$this->answer = $answer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.faq');
    }
}
