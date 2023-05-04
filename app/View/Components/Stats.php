<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Stats extends Component
{
    public $views;
    public $clicks;
    public $ctr;
    public $linksImpressions;

    /**
     * Create a new component instance.
     */
    public function __construct($views, $clicks, $ctr, $linksImpressions)
    {
        $this->views = $views;
        $this->clicks = $clicks;
        $this->ctr = $ctr;
        $this->linksImpressions = $linksImpressions;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stats');
    }
}
