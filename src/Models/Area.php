<?php

namespace Src\Models;

 class Area{
    public string $clave;
    public  string $descripcion;
   
    public  \PDO $db;
    var $table;
    public string $sql;
    public function __construct(){
        $this->db=\Src\App\Database::getConnection();
        $this->table="areas";
    }
    public function create($clave,$descripcion){
        $this->clave=filter_var($clave,FILTER_SANITIZE_STRING);
         $this->descripcion=filter_var($descripcion,FILTER_SANITIZE_STRING);
        
        $sql="INSERT INTO $this->table VALUES (:Clave,:Descripcion)";
        
        $stmt=$this-> db->prepare($sql);
        $stmt->bindParam(":Clave",$this->clave,\PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion",$this->descripcion,\PDO::PARAM_STR);
       
        $stmt->execute();
        return $stmt;
    }
    public  function seeAll()
    {
        $sql="SELECT * FROM $this->table";
        $stmt=$this-> db->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public  function findByClave($clave)
    {
        $this->clave=filter_var($clave,FILTER_SANITIZE_STRING);

        $sql="SELECT * FROM $this->table WHERE Clave = :Clave";
      
        $stmt=$this-> db->prepare($sql);

        $stmt->bindParam(":Clave",$this->clave,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
    public function update($descripcion,$clave){
        $this->descripcion=filter_var($descripcion,FILTER_SANITIZE_STRING);
         $this->clave=filter_var($clave,FILTER_SANITIZE_STRING);

       
        $sql="UPDATE $this->table SET Descripcion = :Descripcion WHERE Clave = :Clave";

        $stmt=$this-> db->prepare($sql);
        $stmt->bindParam(":Descripcion",$this->descripcion,\PDO::PARAM_STR);
        $stmt->bindParam(":Clave",$this->clave,\PDO::PARAM_STR);

        $stmt->execute();
        return $stmt;
    }
    public  function delete($clave)
    {
        $this->clave=filter_var($clave,FILTER_SANITIZE_STRING);

        $sql="DELETE  FROM $this->table WHERE Clave = :Clave";
      
        $stmt=$this-> db->prepare($sql);

        $stmt->bindParam(":Clave",$this->clave,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
}