<?php

class MateriasModel{
    private $db;


    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=materia;charset=utf8', 'root', '');
    }

    function getMaterias(){
        //$sentencia = $this->db->prepare("select * from materia");
        $sentencia = $this->db->prepare("SELECT carrera.*, materia.id_materia as id_materia, materia.nombre as nombre, materia.profesor FROM carrera RIGHT JOIN materia ON materia.id_carrera = carrera.id_carrera");
        $sentencia->execute();
        $materias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $materias;
    }

    function getMateriasConCarreras($id_carrera) {
        $query = $this->db->prepare("SELECT carrera.*, materia.nombre as materia, materia.profesor FROM carrera RIGHT JOIN materia ON materia.id_carrera = carrera.id_carrera WHERE carrera.id_carrera = $id_carrera");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getMateriasConCarrerasTodas() {
        $query = $this->db->prepare("SELECT carrera.*, materia.nombre as materia, materia.profesor FROM carrera RIGHT JOIN materia ON materia.id_carrera = carrera.id_carrera");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCarreraPorDuracion($duracion) {
        if ($duracion == "00")
            $query = $this->db->prepare("SELECT carrera.*, materia.nombre as materia, materia.profesor FROM carrera RIGHT JOIN materia ON materia.id_carrera = carrera.id_carrera GROUP BY carrera.id_carrera");
        else
            $query = $this->db->prepare("SELECT carrera.*, materia.nombre as materia, materia.profesor FROM carrera RIGHT JOIN materia ON materia.id_carrera = carrera.id_carrera WHERE carrera.duracion $duracion GROUP BY carrera.id_carrera");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertMateria($nombreMateria, $nombreProfesor, $id_carrera){
        $sentencia = $this->db->prepare("INSERT INTO materia(nombre, profesor, id_carrera) VALUES(?, ?, ?)");
        $sentencia->execute(array($nombreMateria, $nombreProfesor, $id_carrera));
    }

    function deleteMateria($id){
        $sentencia = $this->db->prepare("DELETE FROM materia WHERE id_materia=?");
        $sentencia->execute(array($id));
    }

    function updateMateria($id, $nombre, $profesor, $id_carrera){       
        $sentencia = $this->db->prepare("UPDATE materia SET nombre = '$nombre', profesor = '$profesor', id_carrera='$id_carrera' WHERE id_materia=?");
        $sentencia->execute(array($id));
    }

    function searchMateria($nombre){       
        $sentencia = $this->db->prepare("SELECT * FROM materia WHERE nombre LIKE '$nombre'");
        $sentencia->execute();
        $materias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $materias;
    }

}