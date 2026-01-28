<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;

class Usuarios
{
    public function index(?string $param = null): void
    {
        Auth::check();
        require __DIR__ . '/../../Views/usuarios.php';
    }
}
