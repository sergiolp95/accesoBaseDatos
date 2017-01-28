<?php

include 'dbManager.php';

$borrarProfesor = new gestorBD();

$borrarProfesor ->query("DELETE FROM profesores WHERE id_profesor = :id");

$borrarProfesor ->bind(":id", filter_input(INPUT_GET,"id"));

$borrarProfesor ->execute();

header("Location: ../vistas/profesores/profesores.php");