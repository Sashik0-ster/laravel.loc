<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SidebarServiceProvider extends ServiceProvider
{
    protected array $navItems = [
        ['route' => 'dashboard', 'label' => 'Головна', 'icon' => 'grid'],
        ['route' => 'income', 'label' => 'Доходи', 'icon' => 'dollar'],
        ['route' => 'expenses', 'label' => 'Витрати', 'icon' => 'dollar'],
        ['route' => 'saving', 'label' => 'Заощадження', 'icon' => 'clock'],
        ['route' => 'goal', 'label' => 'Цілі', 'icon' => 'briefcase'],
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ділимося змінною $sidebarItems з усіма view
        View::share('sidebarItems', $this->navItems);
    }
}
