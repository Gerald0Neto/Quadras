<?php

namespace App\Controllers\Services;

class LoadPageAdm
{

    private $urlController;
    private $urlParameter;
    private $classLoad;

    private $listPgPublic = [
        "Login",
        "Inicial",
        "Relatorios",
        "Agendamento",
        "Configuracoes",
        "Usuarios",
        "Quadras",
        "FormLogin",
        "Logout"
    ];

    private $listPgPrivate = ["Dashboard", "ListUsers"];
    private $listDirectory = ["login", "dashboard", "users", "publicarea"];
    private $listPackages  = [""];


    /**
     * Verificar se existe a página com o método checkPageExists
     * Verificar se e existe a classe com o método checkControllersExists
     * @param string $urlController Recebe da URL o nome da controller
     * @param string $urlParameter Recebe da URL o parâmetro
     * 
     * @return void
     */
    public function LoadPageAdm(?string $urlController, ?string $urlParameter): void
    {

        $this->urlController = $urlController;
        $this->urlParameter = $urlParameter;

        // Verificar se existe a página
        if (!$this->checkPageExists()) {
            die("Pagina não encontrada!");
        }

        // Verificar se e existe a classe
        if (!$this->checkControllersExists()) {
            die("Controller não encontrada!");
        }
    }

    /**
     * Verificar se a página existe no array de páginas públicas ou privadas
     * 
     * @return bool
     */
    private function checkPageExists(): bool
    {

        // Verificar se existe a página no array de página pública
        if (in_array($this->urlController, $this->listPgPublic)) {
            return true;
        }

        // Verificar se existe a página no array de página privada
        if (in_array($this->urlController, $this->listPgPrivate)) {
            return true;
        }

        return false;
    }

    /**
     * Verificar se existe a controller
     * Chamar o método para verificar se existe o método dentro da controller
     * 
     * @return bool
     */
    private function checkControllersExists(): bool
    {
        // Público
        $public = "\\App\\Controllers\\Publicarea\\" . $this->urlController;
        if (class_exists($public)) {
            $this->classLoad = $public;
            $this->loadMetodo();
            return true;
        }


        return false;
    }


    /**
     * Verificar se existe o método e carrega a página/controller
     *
     * @return void
     */
    private function loadMetodo(): void
    {
        $classLoad = new $this->classLoad();

        // Se existir parâmetro, ele vira método
        $method = $this->urlParameter ?: 'index';

        if (!method_exists($classLoad, $method)) {
            die("Método '$method' não encontrado");
        }

        $classLoad->$method();
    }

}
