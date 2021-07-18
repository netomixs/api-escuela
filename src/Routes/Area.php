<?php

use Slim\Routing\RouteCollectorProxy;
$app->group('/area',function(RouteCollectorProxy $group){
    $group->post('/registrar',\Src\Controllers\Area::class . ":create");
    $group->get('/mostrarTodo',\Src\Controllers\Area::class . ":seeAll");
    $group->post('/buscar-clave',\Src\Controllers\Area::class . ":buscarPorClave");
    $group->put('/actualizar',\Src\Controllers\Area::class . ":update");
    $group->delete('/eliminar',\Src\Controllers\Area::class . ":delete");


});
 

