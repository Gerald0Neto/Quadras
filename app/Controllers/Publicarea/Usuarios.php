<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;
use App\Models\UsuariosModel\UsuariosModel;
class Usuarios
{

    public function insert()
    {
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            
            $dados = [
                "nome"     => $_POST['nome'],
                "email"    => $_POST['email'],
                "senha"    => $_POST['senha'],
                "telefone" => $_POST['telefone'],
                "perfil"   => $_POST['perfil']
            ];

            $modelUsuarios = new UsuariosModel();
            $modelUsuarios->insert($dados);
            header('Location: ../usuarios');
            exit;
        }
    }

    public function index(?string $param = null): void
    {
        $modelUsuarios = new UsuariosModel();
        $listarUsuarios = $modelUsuarios->listar();
        Auth::check();
        require __DIR__ . '/../../Views/usuarios.php';
    }
}
