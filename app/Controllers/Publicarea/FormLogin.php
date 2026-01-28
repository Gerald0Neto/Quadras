<?php

namespace App\Controllers\Publicarea;

use App\Models\LoginUser\LoginFormModel;
use App\Services\Auth;
use App\Services\Redirect;

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

        $usuarioModel = new LoginFormModel();
        $user = $usuarioModel->buscarDadosUser($email, $senha);

        if ($user && password_verify($senha, $user['senha'])) {
            Auth::login($user);
            Redirect::to("Inicial");
            //header("Location: ./../Inicial");
            exit;
        }

        Redirect::to('Form-Login?error=1');
        exit;
    }
}
