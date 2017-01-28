<?php

include 'dbManager.php';

$borrarAlumno = new gestorBD();

$borrarAlumno ->query("DELETE FROM asignaturas WHERE id_asignatura = :id");

$borrarAlumno ->bind(":id", filter_input(INPUT_GET,"id"));

$borrarAlumno ->execute();

header("Location: ../vistas/asignaturas/asignaturas.php");