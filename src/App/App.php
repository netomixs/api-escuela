<?php
use Slim\Factory\AppFactory;
require __DIR__.'/../../vendor/autoload.php';

$app = AppFactory::create();
require __DIR__."/Config.php";
require __DIR__."/Router.php";
//require __DIR__."/api-escuelas/App.php";
require __DIR__."/Middleware.php";
$app->run();
