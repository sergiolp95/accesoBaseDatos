<?php

include 'dbManager.php';

$miBBDD = new gestorBD();

$miBBDD ->query("UPDATE alumnos SET nombre_alumno=:nombre,"
        . "apellido_alumno=:apellido,"
        . "edad_alumno=:edad,"
        . "fecha_alumno=:fecha,"
        . "sexo_alumno=:sexo,"
        . "telefono_alumno=:telefono,"
        . "direccion_alumno=:direccion,"
        . "id_curso=:idCurso"
        . " WHERE id_alumno=:id" );

$miBBDD->bind(":nombre",filter_input(INPUT_POST, "nombre"));
$miBBDD->bind(":apellido",filter_input(INPUT_POST, "apellidos")); 
$miBBDD->bind(":edad",filter_input(INPUT_POST, "edad"));
$miBBDD->bind(":fecha",filter_input(INPUT_POST, "fecha"));
$miBBDD->bind(":sexo",filter_input(INPUT_POST, "sexo"));
$miBBDD->bind(":telefono",filter_input(INPUT_POST, "telefono"));
$miBBDD->bind(":direccion",filter_input(INPUT_POST, "direccion"));
$miBBDD->bind(":idCurso",filter_input(INPUT_POST, "idCurso"));
$miBBDD->bind(":id",filter_input(INPUT_POST, "idAlumno"));

$miBBDD->execute();
header("Location: ../vistas/alumnos/alumnos.php");
