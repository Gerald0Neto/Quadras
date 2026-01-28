<?php
require_once './vendor/autoload.php';
require_once './config/config.php';

use App\Controllers\Services\PageController;

$url = new PageController();
$url->loadPage();