<?php

namespace App\Controllers\Publicarea;

use App\Services\Auth;
use App\Models\QuadrasGerenciamento\QuadrasModel;

class Quadras
{
    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'nome'   => $_POST['nome'],
                'tipo'   => $_POST['tipo'],
                'status' => $_POST['status']
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
