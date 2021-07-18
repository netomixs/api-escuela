<?php

namespace Src\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class Area
{

    function create(Request $request, Response $response): Response
    {
        $requestParams = (array)$request->getParsedBody();
        $clave = $requestParams["num_clave"];
        $descripcion = $requestParams["descripcion"];


        $area = new \Src\Models\Area();
        $stmt = $area->create($clave, $descripcion);
        if ($stmt->rowCount() == 0) {
            $result = [
                "error" => "true",
                "code" => "500",
                "body" => "Ocurrio un error en el servidor y no se puede registrar Area"
            ];
            $response->getBody()->write(json_encode($result));
            return $response;
        } else {
            $result = [
                "error" => "false",
                "code" => "200",
                "body" => "Se registro Area"
            ];
            $response->getBody()->write(json_encode($result));
            return $response;
        }
    }
    function findByClave(Request $request, Response $response): Response
    {
        $requestParams = (array)$request->getParsedBody();
        $clave = $requestParams["num_clave"];

        $area = new \Src\Models\Area();
        $stmt = $area->findByClave($clave);

        if ($stmt->rowCount() <= 0) {
            $result = [
                "error" => "true",
                "code" => "500",
                "body" => "Ocurrio un error en el servidor y no se puede encontar el area"
            ];
            $response->getBody()->write(json_encode($result));
            return $response;
        } else {
            $areaInfo = $stmt->fetch();
            $result = [
                "error" => "false",
                "code" => "200",
                "body" => $areaInfo
            ];
            $response->getBody()->write(json_encode($result));
            return $response;
        }
    }
    public function seeAll(Request $request, Response $response):Response
{
    $area = new \Src\Models\Area();
    $stmt=$area->seeAll();
    
    if($stmt->rowCount() < 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor "
        ];
             $response -> getBody()->write(json_encode($result));
         return $response;
            }else{
                $result = [
                    "error" => "false",
                    "code"=>"200",
                    "body"=>$stmt->fetchAll()
                ];
                $response -> getBody()->write(json_encode($result));
                return $response;
            }      
         return $response;
            
}
function update(Request $request, Response $response):Response{
    $requestParams= (array)$request->getParsedBody();
    $clave=$requestParams["num_clave"];
    $descripcion=$requestParams["descripcion"];


    $area=new \Src\Models\Area();
    $stmt=$area->update($descripcion,$clave);
    if($stmt->rowCount() == 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor "
        ];
             $response -> getBody()->write(json_encode($result));
         return $response;
            }else{
                $result = [
                    "error" => "false",
                    "code"=>"200",
                    "body"=>"Se actualizo alumno"
                ];
                $response -> getBody()->write(json_encode($result));
                return $response;
            }      
}
function delete(Request $request, Response $response):Response{
    $requestParams= (array)$request->getParsedBody();
    $clave=$requestParams["num_clave"];

    $area=new \Src\Models\Area();
    $stmt=$area->delete($clave);
    if($stmt->rowCount() == 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor "
        ];
             $response -> getBody()->write(json_encode($result));
         return $response;
            }else{
                $result = [
                    "error" => "false",
                    "code"=>"200",
                    "body"=>"Se elimino area"
                ];
                $response -> getBody()->write(json_encode($result));
                return $response;
            }      
}
}
