<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    public string $title;
    public ?string $subtitle;

    public function __construct(string $title = 'GiftMed Admin', ?string $subtitle = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function render(): View|Closure|string
    {
        // This MUST match the blade file location below.
        return view('admin.layouts.admin');
    }
}
