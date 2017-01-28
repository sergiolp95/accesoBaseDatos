<?php

include 'dbManager.php';

$miBBDD = new gestorBD();

$miBBDD ->query("UPDATE profesores SET nombre_profesor=:nombre,"
        . "apellido_profesor=:apellido,"
        . "calle_profesor=:calle,"
        . "numero_profesor=:numero,"
        . "cp_profesor=:cp,"
        . "localidad_profesor=:localidad,"
        . "provincia_profesor=:provincia,"
        . "fecha_profesor=:fecha,"
        . "sexo_profesor=:sexo,"
        . "sueldo_profesor=:sueldo"
        . " WHERE id_profesor=:id" );

$miBBDD->bind(":nombre",filter_input(INPUT_POST, "nombre"));
$miBBDD->bind(":apellido",filter_input(INPUT_POST, "apellidos")); 
$miBBDD->bind(":calle",filter_input(INPUT_POST, "calle"));
$miBBDD->bind(":numero",filter_input(INPUT_POST, "numero"));
$miBBDD->bind(":cp",filter_input(INPUT_POST, "cp"));
$miBBDD->bind(":localidad",filter_input(INPUT_POST, "localidad"));
$miBBDD->bind(":provincia",filter_input(INPUT_POST, "provincia"));
$miBBDD->bind(":fecha",filter_input(INPUT_POST, "fecha"));
$miBBDD->bind(":sexo",filter_input(INPUT_POST, "sexo"));
$miBBDD->bind(":sueldo",filter_input(INPUT_POST, "sueldo"));
$miBBDD->bind(":id",filter_input(INPUT_POST, "idProfesor"));

$miBBDD->execute();
header("Location: ../vistas/profesores/profesores.php");