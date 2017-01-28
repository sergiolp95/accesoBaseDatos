<?php




$nombreCurso = filter_input(INPUT_POST, "nombreCurso");
//Query para enviar los datos a la base de datos

if (!empty($nombreCurso)){      //si nombre curso esta lleno ejecutar...
    include 'dbManager.php';
    $miBBDD = new gestorBD();
    
    $id = filter_input(INPUT_POST, "idCurso");  




    if(!empty($_FILES["foto"]["tmp_name"])){ //si la foto esta insertada ejecutar...

    /* @var $fotoVieja para almacenar la imagen antigua */
            $fotoVieja = filter_input(INPUT_POST, "fotoVieja");

        unlink('../img/'.$fotoVieja);   //para borrar la imagen antigua antes de subir la nueva

        include '../lib/simpleimage.php';   

        
            $subidaImagenes = new SimpleImage($_FILES["foto"]["tmp_name"]);     //nueva imagen
            $subidaImagenes->save("../img/curso_".$id.".jpg");   //guarda imagen


            $miBBDD ->query("UPDATE cursos SET nombre_curso=:nombre, imagen_curso=:imagen WHERE id_curso=:id" );    //actualiza nombre curso e imagen curso
            //referencias de las sentencias
            $miBBDD ->bind(":nombre",  filter_input(INPUT_POST, "nombreCurso"));
            $miBBDD ->bind(":id",  filter_input(INPUT_POST, "idCurso"));
            $miBBDD->bind(":imagen", "curso_".$id.".jpg");  //asigna nombre a la foto para bindearla en la query


        }
    else{   //si la imagen esta vacia

            $miBBDD ->query("UPDATE cursos SET nombre_curso=:nombre WHERE id_curso=:id" );//actualiza nombre curso solo

            //referencias de las sentencias
            $miBBDD ->bind(":nombre",  filter_input(INPUT_POST, "nombreCurso"));
            $miBBDD ->bind(":id",  filter_input(INPUT_POST, "idCurso"));

    }


$miBBDD->execute();

//asignaturas

    $miBBDD -> query ("DELETE from cursos_asignaturas WHERE id_curso = ".$id);
        $miBBDD ->execute();
    $asignaturas = filter_input(INPUT_POST, "asignaturas",  FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    for($i=0; $i<count($asignaturas); $i++){
        $miBBDD -> query("INSERT into cursos_asignaturas (id_asignatura, id_curso) values (".$asignaturas[$i].", ".$id.")");
           $miBBDD ->execute();
    }

    header("Location: ../vistas/cursos/cursos.php");
}

 else {     //si nombre curso esta vacio
    $idCurso = filter_input(INPUT_POST, "idCurso");
    header("Location: ../vistas/cursos/modificarCurso.php?id=".$idCurso); //permanece en la pantalla del curso a modificar en concreto
}