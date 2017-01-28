<?php

include 'dbManager.php';

$miBBDD = new gestorBD();

$miBBDD ->query("UPDATE asignaturas SET nombre_asignatura=:nombre,"
        . "descripcion_asignatura=:descripcion,"
        . "duracion_asignatura=:duracion,"
        . "id_profesor=:profesor"
        . " WHERE id_asignatura=:id" );

$miBBDD->bind(":nombre",filter_input(INPUT_POST, "nombre"));
$miBBDD->bind(":descripcion",filter_input(INPUT_POST, "descripcion")); 
$miBBDD->bind(":duracion",filter_input(INPUT_POST, "duracion"));
$miBBDD->bind(":id",filter_input(INPUT_POST, "id"));
$miBBDD->bind(":profesor",filter_input(INPUT_POST, "idProfe"));

$miBBDD->execute();
header("Location: ../vistas/asignaturas/asignaturas.php");