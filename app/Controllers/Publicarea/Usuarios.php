<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;
use App\Models\UsuariosModel\UsuariosModel;
class Usuarios
{
    public function index(?string $param = null): void
    {
        $modelUsuarios = new UsuariosModel();
        $listarUsuarios = $modelUsuarios->listar();
        Auth::check();
        require __DIR__ . '/../../Views/usuarios.php';
    }
}
