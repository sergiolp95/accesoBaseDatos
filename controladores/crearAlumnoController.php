<?php

include "dbManager.php";

$newAlumno = new gestorBD();

//Query para enviar los datos a la base de datos
$newAlumno->query("INSERT into alumnos "
        . "(nombre_alumno,apellido_alumno,edad_alumno,fecha_alumno,sexo_alumno,telefono_alumno,direccion_alumno,id_curso)"
        ." values (:nombre,:apellido,:edad,:fecha,:sexo,:telefono,:direccion,:id)");

//Metodo que te permite vincular,unir o sustituir los huecos por el valor que le viene de la BBDD
//$newProfesor->bind(":nombre",$_POST["nombre"]); Los 2 estan bien lo que pasa es que uno es mas anticuado que el otro
$newAlumno->bind(":nombre",filter_input(INPUT_POST, "nombre"));
$newAlumno->bind(":apellido",filter_input(INPUT_POST, "apellidos")); 
$newAlumno->bind(":edad",filter_input(INPUT_POST, "edad"));
$newAlumno->bind(":fecha",filter_input(INPUT_POST, "fecha"));
$newAlumno->bind(":sexo",filter_input(INPUT_POST, "sexo"));
$newAlumno->bind(":telefono",filter_input(INPUT_POST, "telefono")); 
$newAlumno->bind(":direccion",filter_input(INPUT_POST, "direccion")); 
$newAlumno->bind(":id",filter_input(INPUT_POST, "idCursos")); 



$newAlumno ->execute();



header("Location: ../vistas/alumnos/alumnos.php");