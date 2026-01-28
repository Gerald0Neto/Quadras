<?php

namespace App\Controllers\publicarea;

use App\Services\Auth;

class Agendamento
{
    public function index(?string $param = null): void
    {
        Auth::check();
        require __DIR__ . '/../../Views/agendamento.php';
    }
}
