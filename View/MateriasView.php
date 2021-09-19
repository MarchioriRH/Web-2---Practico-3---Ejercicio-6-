<?php

include_once "./Templates/templates.php";

class MateriasView{

    function showMaterias($materias){
        showHeader();
        echo '<div class="container">';
        echo '</ul>';
        echo '<h1>Materias 2021</h1><ul>';
        
        foreach($materias as $materia) {
            echo '<li><div class="card-body">ID Materia: '. $materia->id_materia .' - Nombre Materia: '.$materia->nombre .' - Carrera: '.$materia->carrera .' - Nombre Profesor: '.$materia->profesor.' - <a class="btn btn-danger" href="deleteMateria/'.$materia->id_materia.'">Borrar</a></div></li>';
            }
        echo '</ul>';
        echo '<a href="'.BASE_URL.'home">Volver</a>';
        showForms();
        }

    function showMateriasPorCarrera($joinTablas,$titulo){
        showHeader();
        echo '<div class="container">';
        
        if ($titulo == "Todas las materias")
            echo '<h1>'.$titulo.'</h1><ul>';
        else
            echo '<h1>'.$titulo.$joinTablas[0]->carrera.'</h1><ul>';
        foreach($joinTablas as $resultado){ 
             echo '<li>Materia: '.$resultado->materia.' - Profesor: '.$resultado->profesor.'</li>';
        }
        echo '</ul>';
        echo '<a href="'.BASE_URL.'home">Volver</a>';
        showForms();
    }

    function showCarrerasPorDuracion($joinTablas,$titulo){
        showHeader();
        echo '<div class="container">';
        echo '<h1>'.$titulo.'</h1><ul>';
        foreach($joinTablas as $resultado){ 
            echo '<li>Carrera: '. $resultado->carrera.' - Duracion de la carrera: '.$resultado->duracion.' años</li>';
        }
        echo '</ul>';
        echo '<a href="'.BASE_URL.'home">Volver</a>';
        showForms();
    }
}