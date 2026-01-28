<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;

class Inicial
{
    public function index(?string $param = null): void
    {
        Auth::check();
        
        $dadosUser = Auth::user();
        require __DIR__ . '/../../Views/inicial.php';
    }
}
