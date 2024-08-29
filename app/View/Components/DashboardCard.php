<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $title;
    public $content;
    public $route;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $content, $route)
    {
        $this->title = $title;
        $this->content = $content;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-card');
    }
}
