<?php

namespace App\Controllers\Services;

use App\Helpers\ClearUrl;
use App\Helpers\SlugController;

/**
 * Recebe a URL e manipula
 * 
 */
class PageController
{
    private $url;
    private $urlArray;
    private $urlController = "";
    private $urlParameter = "";

    /**
     * Recebe a URL do .htaccess
     */
    public function __construct()
    {
        //echo "Carregar página.<br><br>";

        // Verificar se vem valor na variável url enviada pelo .htaccess
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {

            // Receber o valor da variável url enviada pelo .htaccess
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            //echo "Acessar o endereço: " . $this->url . "<br><br>";

            // Chamar a classe helper para limpar a URL
            $this->url = ClearUrl::clearUrl($this->url);
            //var_dump($this->url);

            // Converter a string da URL em array
            $this->urlArray  = explode("/", $this->url);
            //var_dump($this->urlArray);

            // Verificar se existe a controller na URL
            if (isset($this->urlArray[0])) {
                // Chamar a classe helper para converter a controller enviada na URL para o formato da classe
                $this->urlController = SlugController::slugController($this->urlArray[0]);
            } else {
                $this->urlController = SlugController::slugController("login");
            }

            // Verificar se existe o parâmetro na URL
            if (isset($this->urlArray[1])) {
                $this->urlParameter = $this->urlArray[1];
            } 

        } else {
            $this->urlController = SlugController::slugController("login");
        }
        //var_dump($this->urlController);
        //var_dump($this->urlParameter);
    }

    public function loadPage(): void
    {  
        // Instanciar a classe para validar e carregar página/controller 
        $loadPageAdm = new LoadPageAdm();
        $loadPageAdm->LoadPageAdm($this->urlController, $this->urlParameter);
    }
}