<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;

class Configuracoes
{
    public function index(?string $param = null): void
    {
        Auth::check();
        require __DIR__ . '/../../Views/configuracoes.php';
    }
}
