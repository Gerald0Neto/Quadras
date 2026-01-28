<?php

namespace App\Controllers\Publicarea;

class FormLogin
{
    public function index(): void
    {
        require __DIR__ . '/../../Views/formlogin.php';
    }

    public function auth(): void
    {
        session_start();

        $email = $_POST['email'] ?? NULL;
        $senha = $_POST['senha'] ?? NULL;

        if ($email === 'admin@admin.com' && $senha === '123') {

            $_SESSION['user'] = [
                'id' => 1,
                'nome' => 'Administrador'
            ];

            header("Location: ./../Inicial");
            exit;
        }

        header("Location: ./?error=1");
        exit;
    }
}
