<?php
require_once __DIR__ . '/App.php';
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/../src/exceptions/NotFoundException.php';
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/utils/MyPhp.php';


$config = require_once __DIR__ . '/../app/config.php'; 
App::bind('config',$config);    // Guardamos la configuración en el contenedor de servicios

$router = Router::load('app/routes.php'); 
App::bind('router',$router); 

$logger = MyLog::load('logs/curso.log'); 
App::bind('logger',$logger);