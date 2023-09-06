<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title ? $title : env('APP_NAME');
    }

    public function render(): View|Closure|string
    {
        return view('layouts.app');
    }
}
