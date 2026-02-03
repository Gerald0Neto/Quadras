<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;
use App\Models\QuadrasGerenciamento\QuadrasModel;

class Quadras
{
    public function editar()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $dados = [
                'id'     => (int) $_POST['id'] ?? NULL,
                'nome'   => $_POST['nome']     ?? NULL,
                'tipo'   => $_POST['tipo']     ?? NULL,
                'status' => $_POST['status']   ?? NULL 
            ];

            $model = new QuadrasModel();
            $model->update($dados);

            header('Location: ../quadras');
            exit;
        }
    }
    public function excluir()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $dados = [
                'id' => $_POST['id']
            ];

            $modelQuadras = new QuadrasModel();
            $modelQuadras->excluir($dados);

            header('Location: ../quadras');
            exit;
        }

    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'nome'   => $_POST['nome']   ?? NULL,
                'tipo'   => $_POST['tipo']   ?? NULL,
                'status' => $_POST['status'] ?? NULL
            ];

            $model = new QuadrasModel();
            $model->inserir($dados);

            // Redireciona para evitar reenvio do form
            header('Location: ../quadras');
            exit;
        }
    }   

    public function index(?string $param = null): void
    {
        $modelQuadras = new QuadrasModel();
        $listarQuadras = $modelQuadras->listar();
        Auth::check();
        require __DIR__ . '/../../Views/quadras.php';
    }
}
