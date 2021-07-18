<?php

namespace Src\Models;

 class Alumno{
    public string $nombre;
    public  string $control;
    public  string $carrera;
    public  int $incripcion;
    public  \PDO $db;
    var $table;
    public string $sql;
    public function __construct(){
        $this->db=\Src\App\Database::getConnection();
        $this->table="alumnos";
    }
    public function create($control,$nombre,$carrera,$incripcion){
        $this->control=filter_var($control,FILTER_SANITIZE_STRING);
         $this->nombre=filter_var($nombre,FILTER_SANITIZE_STRING);
        $this->carrera=filter_var($carrera,FILTER_SANITIZE_STRING);
        $this->incripcion=filter_var($incripcion,FILTER_SANITIZE_NUMBER_INT);
       
        $sql="INSERT INTO $this->table VALUES (:Control,:Nombre,:Carrera,:Inscripcion)";
        
        $stmt=$this-> db->prepare($sql);
        $stmt->bindParam(":Control",$this->control,\PDO::PARAM_STR);
        $stmt->bindParam(":Nombre",$this->nombre,\PDO::PARAM_STR);
        $stmt->bindParam(":Carrera",$this->carrera,\PDO::PARAM_STR);
        $stmt->bindParam(":Inscripcion",$this->incripcion,\PDO::PARAM_INT);
       
        $stmt->execute();
        return $stmt;
    }
    public  function mostrarTodo()
    {
        $sql="SELECT * FROM $this->table";
        $stmt=$this-> db->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public  function buscarPorControl($control)
    {
        $this->control=filter_var($control,FILTER_SANITIZE_STRING);

        $sql="SELECT * FROM $this->table WHERE Control= :Control";
        $stmt=$this-> db->prepare($sql);

        $stmt->bindParam(":Control",$this->control,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
    public function actualizar($control,$nombre,$carrera,$incripcion){
        $this->control=filter_var($control,FILTER_SANITIZE_STRING);
         $this->nombre=filter_var($nombre,FILTER_SANITIZE_STRING);
        $this->carrera=filter_var($carrera,FILTER_SANITIZE_STRING);
        $this->incripcion=filter_var($incripcion,FILTER_SANITIZE_NUMBER_INT);
       
        $sql="UPDATE $this->table SET Nombre = :Nombre, Carrera = :Carrera, Inscripcion = :Inscripcion WHERE Control = :Control";

        $stmt=$this-> db->prepare($sql);
        $stmt->bindParam(":Control",$this->control,\PDO::PARAM_STR);
        $stmt->bindParam(":Nombre",$this->nombre,\PDO::PARAM_STR);
        $stmt->bindParam(":Carrera",$this->carrera,\PDO::PARAM_STR);
        $stmt->bindParam(":Inscripcion",$this->incripcion,\PDO::PARAM_INT);
       
        $stmt->execute();
        return $stmt;
    }
    public  function Eliminar ($control)
    {
        $this->control=filter_var($control,FILTER_SANITIZE_STRING);

        $sql="DELETE FROM $this->table WHERE Control= :Control";
        $stmt=$this-> db->prepare($sql);

        $stmt->bindParam(":Control",$this->control,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
 }