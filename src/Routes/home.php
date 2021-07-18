<?php

use Slim\Routing\RouteCollectorProxy;
$app->group('/home',function(RouteCollectorProxy $group){
    $group->post('/h',\Src\Controllers\home::class . ':create');
    
    
    });