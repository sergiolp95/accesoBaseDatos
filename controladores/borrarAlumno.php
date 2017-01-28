<?php

include 'dbManager.php';

$borrarAlumno = new gestorBD();

$borrarAlumno ->query("DELETE FROM alumnos WHERE id_alumno = :id");

$borrarAlumno ->bind(":id", filter_input(INPUT_GET,"id"));

$borrarAlumno ->execute();

header("Location: ../vistas/alumnos/alumnos.php");