<?php

include 'dbManager.php';

$borrarCurso = new gestorBD();


$borrarCurso ->query("DELETE FROM cursos WHERE cursos.id_curso = :idCurso");

$borrarCurso ->bind(":idCurso", filter_input(INPUT_GET,"idCurso"));

$borrarCurso ->execute();

header("Location: ../vistas/cursos/cursos.php");
