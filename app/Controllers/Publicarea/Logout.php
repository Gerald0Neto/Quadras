<?php

namespace App\Controllers\Publicarea;

class Logout
{
    public function index(): void
    {
        session_start();
        session_destroy();
        header("Location: ./Form-Login");
        exit;
    }
}
