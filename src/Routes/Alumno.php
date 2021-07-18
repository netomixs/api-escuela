<?php

use Slim\Routing\RouteCollectorProxy;
$app->group('/alumno',function(RouteCollectorProxy $group){
    $group->post('/registrar',\Src\Controllers\Alumno::class . ":create");
    $group->get('/mostrarTodo',\Src\Controllers\Alumno::class . ":mostrarTodo");
    $group->post('/buscarPorControl',\Src\Controllers\Alumno::class . ":findByClave");
    $group->put('/actualizar',\Src\Controllers\Alumno::class . ":actualizar");
    $group->delete('/Eliminar',\Src\Controllers\Alumno::class . ":Eliminar");


});
 

