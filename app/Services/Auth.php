<?php

namespace App\Services;

class Auth
{
    public static function login(array $user): void {
        session_start();
        $_SESSION['user'] = [
            'id'   => $user['id'],
            'nome' => $user['nome'],
            'email'=> $user['email']
        ];
    }
    
    public static function check(): void
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: ./Form-Login");
            exit;
        }
    }

    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }
}
