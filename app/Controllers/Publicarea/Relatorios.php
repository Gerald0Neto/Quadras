<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;

class Relatorios
{
    public function index(?string $param = null): void
    {
        Auth::check();
        require __DIR__ . '/../../Views/relatorios.php';
    }
}
