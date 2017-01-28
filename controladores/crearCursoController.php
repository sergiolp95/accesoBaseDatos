<?php

include 'dbManager.php';
include '../lib/simpleimage.php';


$nombre = filter_input(INPUT_POST, "nombreCurso");

if (!empty($nombre)){
    $cursos = new gestorBD();
    $cursos->query("INSERT into cursos (nombre_curso) values (:nombre_curso)"); //Query para enviar los datos a la base de datos
    //Metodo que te permite vincular,unir o sustituir los huecos por el valor que le viene de la BBDD
    //$newProfesor->bind(":nombre",$_POST["nombre"]); Los 2 estan bien lo que pasa es que uno es mas anticuado que el otro
    $cursos->bind(":nombre_curso",filter_input(INPUT_POST, "nombreCurso"));
    //$cursos->bind(":duracion",filter_input(INPUT_POST, "duracionCurso"));     
    //$cursos->bind(":profesor",filter_input(INPUT_POST, "id"));
    //$cursos->bind(":imagen_curso", $_FILES["foto"]["name"]);
    //ejecuta la peticion
    $cursos ->execute();
     $id = $cursos->lastInsertId();
   
    if(!empty($_FILES["foto"]["tmp_name"])){ 
        
            //necesitamos la referencia de un id de curso para poder renombrar a la foto
       
        $cursos->query("UPDATE cursos set imagen_curso = 'curso_".$id.".jpg' WHERE id_curso=".$id);//Actualiza la imagen curso con ese nombre de imagen concreto
        
        $cursos ->execute();
        $subidaImagenes = new SimpleImage($_FILES["foto"]["tmp_name"]);
        $subidaImagenes->save("../img/curso_".$id.".jpg");
        
        
    }
    
    
    //asignaturas
    
    
    $asignaturas = filter_input(INPUT_POST, "asignaturas",  FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    
    for($i=0; $i<count($asignaturas); $i++){
        $cursos -> query("INSERT into cursos_asignaturas (id_asignatura, id_curso) values (".$asignaturas[$i].", ".$id.")");
           $cursos ->execute();
    }
    
    
//Aquí se redirige a la página index.php si crea bien el curso
header("Location: ../vistas/cursos/cursos.php");

}
 else {

  header("Location: ../vistas/cursos/crearCurso.php"); 
  
}

