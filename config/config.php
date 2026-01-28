<?php
use App\Connections\Conexao;

// Configurações gerais
define('BASE_URL', 'http://localhost/onesoft-quadras/');
define('DB_HOST', 'db');
define('DB_NAME', 'quadras');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// Conexão com banco de dados
$db = new Conexao(DB_HOST, DB_NAME, DB_USER, DB_PASS);