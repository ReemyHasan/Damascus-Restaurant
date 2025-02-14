<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarLink extends Component
{
    public string $title;
    public ?string $route;
    public ?string $icon;
    public bool $isHeading;
    public ?string $badge;
    public ?string $badgeClass;
    public array $submenu;
    public ?string $can;
    public ?string $model;

    public function __construct(string $title, string $route = null,
    string $icon = null, $isHeading = false, string $badge = null,$badgeClass=null,
    array $submenu = [],
    string $can = null,
    string $model = null
    )
    {
        $this->title = $title;
        $this->route = $route;
        $this->icon = $icon;
        $this->isHeading = $isHeading;
        $this->badge = $badge;
        $this->badgeClass = $badgeClass;
        $this->submenu = $submenu;
        $this->can = $can;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-link');
    }
}
