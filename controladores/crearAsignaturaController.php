<?php

include "dbManager.php";

$newAsignatura = new gestorBD();

//Query para enviar los datos a la base de datos
$newAsignatura->query("INSERT into asignaturas "
        . "(nombre_asignatura,descripcion_asignatura,duracion_asignatura,id_profesor)"
        ." values (:nombre,:descripcion,:duracion,:id)");

//Metodo que te permite vincular,unir o sustituir los huecos por el valor que le viene de la BBDD
//$newProfesor->bind(":nombre",$_POST["nombre"]); Los 2 estan bien lo que pasa es que uno es mas anticuado que el otro
$newAsignatura->bind(":nombre",filter_input(INPUT_POST, "nombre"));
$newAsignatura->bind(":descripcion",filter_input(INPUT_POST, "descripcion"));
$newAsignatura->bind(":duracion",filter_input(INPUT_POST, "duracion"));
$newAsignatura->bind(":id",filter_input(INPUT_POST, "idProfe"));




$newAsignatura ->execute();



header("Location: ../vistas/asignaturas/asignaturas.php");