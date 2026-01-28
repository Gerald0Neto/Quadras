<?php
namespace App\Services;

class Redirect {

    public static function to(string $path): void {
        header("Location: /onesoft-quadras/" . $path);
        exit;
    }
}
