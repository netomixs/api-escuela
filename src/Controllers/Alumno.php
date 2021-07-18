<?php
namespace Src\Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class Alumno{
  
 function create(Request $request, Response $response):Response{
    $requestParams= (array)$request->getParsedBody();
    $control=$requestParams["num_control"];
    $nombre=$requestParams["nombre_alumno"];
    $carrera=$requestParams["clave_carrera"];
    $inscrito=$requestParams["esta_inscrito"];

    $alumno=new \Src\Models\Alumno();
    $stmt=$alumno->create($control,$nombre,$carrera,$inscrito);
    if($stmt->rowCount() == 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor y no se puede registrar alumno"
        ];
             $response -> getBody()->write(json_encode($result));
         return $response;
            }else{
                $result = [
                    "error" => "false",
                    "code"=>"200",
                    "body"=>"Se registro alumno"
                ];
                $response -> getBody()->write(json_encode($result));
                return $response;
            }      
}
function buscarPorControl(Request $request, Response $response):Response{
    $requestParams= (array)$request->getParsedBody();
    $control=$requestParams["num_control"];

    $alumno=new \Src\Models\Alumno();
    $stmt=$alumno->buscarPorControl($control);

    if($stmt->rowCount() <= 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor y no se puede encontar alumno"
        ];
             $response -> getBody()->write(json_encode($result));
         return $response;
            }else{
                $alumnoInfo=$stmt->fetch();
                $result = [
                    "error" => "false",
                    "code"=>"200",
                    "body"=>$alumnoInfo
                ];
                $response -> getBody()->write(json_encode($result));
                return $response;
            }      
}
public function mostrarTodo(Request $request, Response $response):Response
{
    $alumno=new \Src\Models\Alumno();
    $stmt=$alumno->mostrarTodo();
    
    if($stmt->rowCount() < 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor y no se puede registrar alumno"
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
function actualizar(Request $request, Response $response):Response{
    $requestParams= (array)$request->getParsedBody();
    $control=$requestParams["num_control"];
    $nombre=$requestParams["nombre_alumno"];
    $carrera=$requestParams["clave_carrera"];
    $inscrito=$requestParams["esta_inscrito"];

    $alumno=new \Src\Models\Alumno();
    $stmt=$alumno->actualizar($control,$nombre,$carrera,$inscrito);
    if($stmt->rowCount() == 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor y no se puede actualizar alumno"
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
function Eliminar(Request $request, Response $response):Response{
    $requestParams= (array)$request->getParsedBody();
    $control=$requestParams["num_control"];

    $alumno=new \Src\Models\Alumno();
    $stmt=$alumno->Eliminar($control);

    if($stmt->rowCount() <= 0){
        $result = [
            "error" => "true",
            "code"=>"500",
            "body"=>"Ocurrio un error en el servidor y no se puede eliminar alumno"
        ];
             $response -> getBody()->write(json_encode($result));
         return $response;
            }else{
                
                $result = [
                    "error" => "false",
                    "code"=>"200",
                    "body"=>"Alumno eliminado"
                ];
                $response -> getBody()->write(json_encode($result));
                return $response;
            }      
}

}