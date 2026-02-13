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

    public function update()
    {
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            
            $dados = [
                "id"       => $_POST['id'],
                "nome"     => $_POST['nome'],
                "email"    => $_POST['email'],
                "telefone" => $_POST['telefone'],
                "perfil"   => $_POST['perfil']
            ];

            $modelUsuarios = new UsuariosModel();
            $modelUsuarios->update($dados);
            header('Location: ../usuarios');
            exit;
        }
    }

    public function excluir()
    {
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            
            $dados = [
                "id" => $_POST['id']
            ];

            $modelUsuarios = new UsuariosModel();
            $modelUsuarios->excluir($dados);
            
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
