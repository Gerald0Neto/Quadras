<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;

class Quadras
{
    public function index(?string $param = null): void
    {
        Auth::check();
        require __DIR__ . '/../../Views/quadras.php';
    }
}
