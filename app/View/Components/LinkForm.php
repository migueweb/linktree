<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkForm extends Component
{
    public $title;
    public $action;
    public $method;
    public $link;
    public $edit;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $action, $method = 'POST', $link = null, $edit = false)
    {
        $this->action = $action;
        $this->method = $method;
        $this->title = $title;
        $this->link = $link;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link-form');
    }
}
