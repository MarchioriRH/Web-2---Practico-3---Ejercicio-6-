<?php

function showHeader(){

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="'.BASE_URL.'" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Materias</title>
    </head>
    <body>';
}


function showFooter(){
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body> </html>';
}

function formNewMateria(){
    echo '<h2>Nueva materia</h2>
    <form action="newMateria" method="post">
        <input type="text" name="materia" id="materia" placeholder="Nombre Materia">
        <input type="text" name="profesor" id="porfesor" placeholder="Nombre Profesor">
        <select id="carrera" name="carrera">
            <option value="00">Seleccionar</option>
            <option value="12">TUDAI</option>
            <option value="13">TUARI</option>
            <option value="14">ING DE SISTEMAS</option>
            <option value="15">LIC EN FISICA</option>
        </select>
        <input type="submit" value="Guardar">
    </form>';
}

function formUpdateMateria(){
    echo '<h2>Actualizar</h2>
    <form action="updateMateria" method="post">
        <input type="number" name="id_materia" id="id_materia" placeholder="ID Materia">
        <input type="text" name="materia" id="materia" placeholder="Nombre Materia">
        <input type="text" name="profesor" id="porfesor" placeholder="Nombre Profesor">
        <select id="carrera" name="carrera">
            <option value="00">Seleccionar</option>
            <option value="12">TUDAI</option>
            <option value="13">TUARI</option>
            <option value="14">ING DE SISTEMAS</option>
            <option value="15">LIC EN FISICA</option>
        </select>
        <input type="submit" value="Actualizar">
    </form>';
}

function formSearchMateria(){
    echo '<h2>Buscar</h2>
    <form action="searchMateria" method="post">
        <input type="text" name="materia" id="materia" placeholder="Nombre Materia">
        <input type="submit" value="Buscar">
    </form>';
}

function formSearchMateriaPorCarrera(){
    echo '<h2>Buscar materias por carrera</h2>
    <form action="searchMateriaPorCarrera" method="post">
        <select id="carrera" name="carrera">
            <option  value="00">TODAS</option>
            <option  value="12">TUDAI</option>
            <option  value="13">TUARI</option>
            <option  value="14">ING DE SISTEMAS</option>
            <option value="15">LIC EN FISICA</option>
        </select>
        <input type="submit" value="Buscar">
    </form>';
}

function formSearchCarreraPorDuracion(){
    echo '<h2>Buscar carrera por duracion</h2>
    <form action="searchCarreraPorDuracion" method="post">
        <select id="carrera" name="duracion">
            <option  value="00">TODAS</option>
            <option  value="< 3">3 años o menos</option>
            <option  value="> 3">Mas de 3 años</option>
        </select>
        <input type="submit" value="Buscar">
    </form>';
}

function showForms(){
    echo '</ul>';
    echo '<h3></h3>';
    formNewMateria();
    echo '<h3></h3>';
    formUpdateMateria();
    echo '<h3></h3>';
    formSearchMateria();
    echo '<h3></h3>';   
    formSearchMateriaPorCarrera();
    echo '<h3></h3>';  
    formSearchCarreraPorDuracion();
    echo '</div>';
    showFooter();
}