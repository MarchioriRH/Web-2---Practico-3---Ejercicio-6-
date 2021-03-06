<?php
require_once "Controller/MateriasController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);
//echo $action;
//print_r($_POST);


$materias = new MateriasController();
// determina que camino seguir según la acción
switch ($params[0]) {
    
    case 'home':
        $materias->showHome(); 
        break;
    case 'newMateria': 
        $materias->newMateria(); 
        break;
    case 'deleteMateria': 
        $materias->deleteMateria($params[1]); 
        break;
    case 'updateMateria': 
        $materias->updateMateria();
        break;
    case 'searchMateria': 
        $materias->searchMateria();
        break;
    case 'searchMateriaPorCarrera': 
        $materias->searchMateriasPorCarrera();
        break;
    case 'searchCarreraPorDuracion': 
        $materias->searchCarreraPorDuracion();
        break;
        
    default: 
        echo('404 Page not found'); 
        break;
}
