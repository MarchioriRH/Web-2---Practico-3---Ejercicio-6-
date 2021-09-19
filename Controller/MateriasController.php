<?php

include_once "./Model/MateriasModel.php";
include_once "./View/MateriasView.php";
include_once "./Model/CarrerasModel.php";

class MateriasController{
    
    private $modelMaterias;
    private $modelCarreras;
    private $view;
    

    function __construct(){
        $this->modelMaterias = new MateriasModel();
        $this->modelCarreras = new CarrerasModel();
        $this->view = new MateriasView();
    }

    function showHome(){
        $materias = $this->modelMaterias->getMaterias();
        $carreras = $this->modelCarreras->getCarreras();
        $materias = $this->modelMaterias->getMaterias();
        //echo ($materias);
        $this->view->showMaterias($materias);
    }

    function newMateria(){
        $this->modelMaterias->insertMateria($_POST['materia'], $_POST['profesor'], $_POST['carrera']);
        $this->showHome();
    }

    function deleteMateria($id){
        $this->modelMaterias->deleteMateria($id);
        $this->showHome();
    }

    function updateMateria(){ 
        print_r($_POST);      
        $this->modelMaterias->updateMateria($_POST['id_materia'],$_POST['materia'], $_POST['profesor'], $_POST['carrera']);
        $this->showHome();
    }

    function searchMateria(){       
        $materias = $this->modelMaterias->searchMateria($_POST['materia']);
        $this->view->showMaterias($materias);
    }

    function searchMateriasPorCarrera(){ 
        if ($_POST['carrera'] == '00'){
            $materias = $this->modelMaterias->getMateriasConCarrerasTodas();
            $this->view->showMateriasPorCarrera($materias, "Todas las materias");
        }
        else { 
            $materias = $this->modelMaterias->getMateriasConCarreras($_POST['carrera']);
            $this->view->showMateriasPorCarrera($materias,"Materias por carrera: ");
        }
    }

    function searchCarreraPorDuracion(){ 
        if ($_POST['duracion'] == '00'){
            $carreras = $this->modelMaterias->getCarreraPorDuracion('00');
            $this->view->showCarrerasPorDuracion($carreras, "Carreras 2021");
        }
        else {     
            $carreras = $this->modelMaterias->getCarreraPorDuracion($_POST['duracion']);
            $this->view->showCarrerasPorDuracion($carreras, "Carreras por duracion: ".$_POST['duracion']." años");
        }
    }


}