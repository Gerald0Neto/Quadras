<?php

namespace App\Services;

class Auth
{
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
