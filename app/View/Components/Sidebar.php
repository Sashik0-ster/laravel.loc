<?php

namespace App\View\Components;

use AllowDynamicProperties;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

//#[AllowDynamicProperties]
class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     */

    public Collection $items;

    public function __construct($items = [])
    {
        $this->items = collect($items)->map(function ($item) {
            return (object)[
                'route' => $item['route'] ?? '#',
                'label' => $item['label'] ?? 'Menu item',
                'icon' => $item['icon'] ?? 'default',
                'active' => request()->routeIs($item['route'] ?? ''),
            ];
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.sidebar');
    }
}
