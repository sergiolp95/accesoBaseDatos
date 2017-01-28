


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Cursos</title>
        <link href="../../css/estilosMenu.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
        <script src="../../lib/particles.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="dust">
        </div>


        <div id="miTabla">
            <div class="title">
                <center><h1>Cursos</h1></center>
            </div><br>
            <?php
            // put your code here
            include "../../controladores/dbManager.php";

            //Creamos el objeto llamando al constructor 
            $miBBDD = new gestorBD();

            //Le lanzamos la consulta a la base de datos 
            $miBBDD->query('SELECT cursos.id_curso,cursos.nombre_curso AS cursonombre,cursos.imagen_curso AS imagen, (SELECT COUNT(DISTINCT asignaturas.id_profesor)      
                                FROM asignaturas 
                                WHERE asignaturas.id_asignatura IN (SELECT cursos_asignaturas.id_asignatura 
                                                                    FROM cursos_asignaturas 
                                                                    WHERE cursos_asignaturas.id_curso = cursos.id_curso)
                               ) AS nprofesores, (SELECT COUNT(cursos_asignaturas.id_asignatura) 
                                              FROM cursos_asignaturas 
                                              WHERE cursos_asignaturas.id_curso = cursos.id_curso) AS nasignaturas
FROM cursos');

            //Le pedimos a la Base de datos que nos devuelva lo que ha encontrado y lo guardamos en la variable cursos
            $cursos = $miBBDD->resultset();
            ?>
            <table>
                <thead>
                <th class="rojo">Nombre del curso</th>
                <th class="rojo">Imágen</th>
                <th class="rojo">NºProfesores</th>
                <th class="rojo">NºAsigaturas</th>
                </thead>

                <tbody>
                    <?php
                    foreach ($cursos as $curso) {
                        ?>
                        <tr>
                            <td><a href="detallesCurso.php?id=<?php echo $curso["id_curso"]; ?>" class="negro"><?php echo $curso["cursonombre"]; ?></a></td>
                            <td><img src="../../img/<?php echo $curso["imagen"]; ?>" width="60" ></td>
                            <td><?php echo $curso["nprofesores"]; ?></td>
                            <td><?php echo $curso["nasignaturas"]; ?></td>
                            <td><a onclick="return confirm('De verdad lo quieres borrar?')" class="borrar" href="../../controladores/borrarCurso.php?idCurso=<?php echo $curso["id_curso"]; ?>">
                                    <img src="../../iconos/del.png" alt="" class="icono"/></a>

                                <br>
                                <a class="modificar" href="modificarCurso.php?id=<?php echo $curso["id_curso"]; ?>">
                                    <img src="../../iconos/edit.png" alt="" class="icono"/></a>

                            </td>


                        </tr>

                        <?php
                    }
                    ?>


                </tbody>

            </table>
            <center><a href="crearCurso.php"><div class="cube flip-to-top">
                        <div class="estado-defecto cursos">
                            <span>Añadir</span>
                        </div>
                        <div class="estado-activo cursos">
                            <span>Crear nuevo curso</span>

                        </div>
                    </div></a>
            </center>
            <br>
            <center><a href="../../index.php"><div class="cube flip-to-top">
                        <div class="estado-defecto cursos">
                            <span>Volver</span>
                        </div>
                        <div class="estado-activo cursos">
                            <span>Volver al inicio</span>

                        </div>
                    </div></a>
            </center>
        </div>


        <script>/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
            window.onload = function () {
                particlesJS.load('dust', '../../js/particles.json', function () {
                    console.log('callback - ../../lib/particles.js config loaded');
                    var h = $(document).height(); /*establece atributo de height = heightpantalla*/
                    document.getElementById('dust').setAttribute("style", "height:" + h + "px");  /*Esto llama al elemento dust del fondo, y establece atributo de height + heightpantalla:px*/
                });
            };
        </script>
    </body>
</html>
