<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Card extends Component
{
    // Робимо властивості публічними, щоб вони автоматично були доступні у Blade
    public ?string $title;
    public string|int|float $content;
    public ?string $description;
    public string $url;
    public string|int|float $sum;

    /**
     * Конструктор компонента
     */
    public function __construct(
        ?string $title = null,
        string|int|float $content = 0,
        string $url = '#',
        ?string $description = null,
        string|int|float $sum = 0
    ) {
        $this->title = $title;
        $this->content = $content;
        $this->url = $url;
        $this->description = $description;
        $this->sum = $sum;
    }

    public function render(): View|\Closure|string
    {
        return view('components.card');
    }
}
