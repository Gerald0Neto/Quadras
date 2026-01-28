<?php

namespace App\Controllers\Publicarea;


class Login
{
    public function index(?string $param = null): void
    {
        require __DIR__ . '/../../Views/login.php';
    }
}
