<?php

class CarrerasModel{
    private $db;


    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=materia;charset=utf8', 'root', '');
    }

    function getCarreras(){
        $sentencia = $this->db->prepare("select * from carrera");
        $sentencia->execute();
        $carreras = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $carreras;
    }

}