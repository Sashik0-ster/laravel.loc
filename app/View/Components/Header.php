<?php

namespace App\View\Components;

use AllowDynamicProperties;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

#[AllowDynamicProperties]
class Header extends Component
{

    public string $title;

    public function __construct($title = null)
    {


        if ($title) {
            $this->title = $title;
            return;
        }


        $this->title = $this->getTitleFromRoute();
    }

    private function getTitleFromRoute(): string
    {
        $routeName = Route::currentRouteName();

        $titles = [
            'dashboard' => 'Головна панель',
            'income' => 'Управління доходами',
            'expenses' => 'Мої витрати',
            'saving' => 'Заощадження та накопичення',
            'goal' => 'Фінансові цілі',
            'registration' => 'Реєстрація',
            'login' => 'Вхід в обліковий запис'
        ];

        // Повертаємо назву зі списку або "Фінансовий помічник" за замовчуванням
        return $titles[$routeName] ?? 'Фінансовий помічник';
    }

    public function render(): View|Factory|Htmlable|\Closure|string|\Illuminate\View\View
    {
        return view('components.header');
    }
}
