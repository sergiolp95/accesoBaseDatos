<?php

include "dbManager.php";

$newProfesor = new gestorBD();




//Query para enviar los datos a la base de datos
$newProfesor->query("INSERT into profesores "
        . "(nombre_profesor,apellido_profesor,calle_profesor,numero_profesor,cp_profesor,localidad_profesor,provincia_profesor,fecha_profesor,sexo_profesor,sueldo_profesor)"
        ." values (:nombre,:apellido,:calle,:numero,:cp,:localidad,:provincia,:fecha,:sexo,:sueldo)");

//Metodo que te permite vincular,unir o sustituir los huecos por el valor que le viene de la BBDD
//$newProfesor->bind(":nombre",$_POST["nombre"]); Los 2 estan bien lo que pasa es que uno es mas anticuado que el otro
$newProfesor->bind(":nombre",filter_input(INPUT_POST, "nombre"));
$newProfesor->bind(":apellido",filter_input(INPUT_POST, "apellidos")); 
$newProfesor->bind(":calle",filter_input(INPUT_POST, "calle"));
$newProfesor->bind(":numero",filter_input(INPUT_POST, "numero"));
$newProfesor->bind(":cp",filter_input(INPUT_POST, "cp"));
$newProfesor->bind(":localidad",filter_input(INPUT_POST, "localidad"));
$newProfesor->bind(":provincia",filter_input(INPUT_POST, "provincia"));
$newProfesor->bind(":fecha",filter_input(INPUT_POST, "fecha"));
$newProfesor->bind(":sexo",filter_input(INPUT_POST, "sexo"));
$newProfesor->bind(":sueldo",filter_input(INPUT_POST, "sueldo"));



$newProfesor ->execute();



header("Location: ../vistas/profesores/profesores.php");