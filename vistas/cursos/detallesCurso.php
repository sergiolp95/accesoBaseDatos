


<?php
include "../../controladores/dbManager.php";
//Creamos el objeto llamando al constructor 
$miBBDD = new gestorBD();

//Le lanzamos la consulta a la base de datos 
$miBBDD->query('SELECT cursos.id_curso,cursos.nombre_curso,cursos.imagen_curso, (SELECT COUNT(DISTINCT asignaturas.id_profesor)      
                                FROM asignaturas 
                                WHERE asignaturas.id_asignatura IN (SELECT cursos_asignaturas.id_asignatura 
                                                                    FROM cursos_asignaturas 
                                                                    WHERE cursos_asignaturas.id_curso = cursos.id_curso)
                               ) AS nprofesores, (SELECT COUNT(cursos_asignaturas.id_asignatura) 
                                              FROM cursos_asignaturas 
                                              WHERE cursos_asignaturas.id_curso = cursos.id_curso) AS nasignaturas, (SELECT COUNT(alumnos.id_alumno) 
                                                                                                                     FROM alumnos 
                                                                                                                     WHERE alumnos.id_curso=cursos.id_curso) as nalumnos  
                FROM cursos 
                WHERE cursos.id_curso=:id');
$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));
$detalles = $miBBDD->single();

//Le lanzamos la consulta a la base de datos de la suma de horas por cada asignatura con la relacion de la asignatura con el idcurso
$miBBDD->query('SELECT SUM(asignaturas.duracion_asignatura) as sumaHoras FROM asignaturas WHERE asignaturas.id_asignatura IN (SELECT cursos_asignaturas.id_asignatura '
        . 'FROM cursos_asignaturas '
        . 'WHERE cursos_asignaturas.id_curso=:id)');
$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));
$nhoras = $miBBDD->single();


//Le lanzamos la consulta a la base de datos de profesores del curso, obteniendolo de la relacion de asignatusas.id_asignatura con el resultado de el id del curso en cuestion
$miBBDD->query('SELECT * FROM profesores WHERE profesores.id_profesor IN (SELECT asignaturas.id_profesor FROM asignaturas WHERE asignaturas.id_asignatura IN
(SELECT cursos_asignaturas.id_asignatura FROM cursos_asignaturas WHERE cursos_asignaturas.id_curso=:id))');
$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));
$profesores = $miBBDD->resultset();


//Le lanzamos la consulta a la base de datos de alumnos del curso
$miBBDD->query('SELECT alumnos.*,cursos.nombre_curso FROM alumnos JOIN cursos ON cursos.id_curso=alumnos.id_curso WHERE alumnos.id_curso=:id');
$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));
$alumnos = $miBBDD->resultset();



//Le lanzamos la consulta a la base de datos 
$miBBDD->query('SELECT cursos_asignaturas.*, profesores.nombre_profesor,profesores.apellido_profesor, asignaturas.*
         FROM cursos_asignaturas 
         JOIN asignaturas ON asignaturas.id_asignatura=cursos_asignaturas.id_asignatura 
         JOIN profesores ON profesores.id_profesor=asignaturas.id_profesor 
         WHERE cursos_asignaturas.id_curso=:id');
$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));
$asignaturas = $miBBDD->resultset();
?>



<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Detalles Curso</title>
        <link href="../../css/estilosMenu.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
        <script src="../../lib/particles.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    </head>
    <body>
        <div id="dust">
        </div>
        <!--        <div id="dust2">
                </div>                                                -->
        <div id="miTabla">
            <center><a href="cursos.php"><div class="cube flip-to-top">
                        <div class="estado-defecto cursos">
                            <span>Volver</span>
                        </div>
                        <div class="estado-activo cursos">
                            <span>Volver a lista de cursos</span>

                        </div>
                    </div></a>
            </center>
            <div class="title">
                <center><h1>Detalles de <?php echo $detalles["nombre_curso"]; ?></h1></center>
            </div>         
            <div class="divDetalle"><img src="../../img/<?php echo $detalles["imagen_curso"]; ?>"/>
                <div class="divCurso">
                    <table>

                        <tbody>
                            <tr height="50"><th class="rojo">Nombre del Curso </th><td><?php echo $detalles["nombre_curso"]; ?><td></tr>
                            <tr height="50"><th class="rojo">Numero de Profesores </th><td><?php echo $detalles["nprofesores"]; ?><td></tr>
                            <tr height="50"><th class="rojo">Numero de Asignaturas </th><td><?php echo $detalles["nasignaturas"]; ?><td></tr>
                            <tr height="50"><th class="rojo">Numero de Alumnos </th><td><?php echo $detalles["nalumnos"]; ?><td></tr>
                            <tr height="50"><th class="rojo">Numero de Horas </th><td><?php echo $nhoras["sumaHoras"]; ?><td></tr>
                        </tbody>
                    </table>
                </div>


                <!--Informacion de profesores del curso-->  

                <div id="miTabla">
                    <div class="title">
                        <center><h1>Listado de Profesores</h1></center>
                    </div>
<?php
if (!empty($profesores)) {
    ?>  
                        <table>
                            <thead>
                            <th class="azul">Nombre</th>
                            <th class="azul">Apellido</th>
                            <th class="azul">Calle</th>
                            <th class="azul">Numero</th>
                            <th class="azul">CP</th>
                            <th class="azul">Localidad</th>
                            <th class="azul">Provincia</th>
                            <th class="azul">Fecha</th>
                            <th class="azul">Sexo</th>
                            <th class="azul">Sueldo</th>
                            </thead>
                            <tbody>
    <?php
    foreach ($profesores as $profesor) {
        ?>
                                    <tr  >
                                        <td><?php echo $profesor["nombre_profesor"]; ?></td>
                                        <td><?php echo $profesor["apellido_profesor"]; ?></td>
                                        <td><?php echo $profesor["calle_profesor"]; ?></td>
                                        <td><?php echo $profesor["numero_profesor"]; ?></td>
                                        <td><?php echo $profesor["cp_profesor"]; ?></td>
                                        <td><?php echo $profesor["localidad_profesor"]; ?></td>
                                        <td><?php echo $profesor["provincia_profesor"]; ?></td>
                                        <td><?php echo $profesor["fecha_profesor"]; ?></td>
                                        <td><?php
                            $profesor["sexo_profesor"];
                            if ($profesor["sexo_profesor"] == 1) {
                                echo 'Hombre';
                            } else if ($profesor["sexo_profesor"] == 2) {
                                echo 'Mujer';
                            } else if ($profesor["sexo_profesor"] == 3) {
                                echo 'Trans';
                            } else if ($profesor["sexo_profesor"] == 4) {
                                echo 'Hermafrodita';
                            } else {
                                echo 'Sin sexo definido';
                            }
        ?></td>
                                        <td><?php echo $profesor["sueldo_profesor"]; ?>€</td>
                                    </tr>
                                            <?php
                                        }
                                        ?>
                            </tbody>
                        </table>
                            <?php } else { ?> 
                        <div class="tablaVacia">
                            No hay profesores en el curso <?php echo $detalles["nombre_curso"]; ?>
                        </div>
<?php } ?>
                </div>
                <!--Informacion asignaturas del curso-->
                <div id="miTabla">
                    <div class="title">
                        <center><h1>Asignaturas</h1></center>
                    </div>
<?php
if (!empty($asignaturas)) {
    ?>  
                        <table>
                            <thead>
                            <th class="naranja">Asignatura</th>
                            <th class="naranja">Descripcion</th>
                            <th class="naranja">Duracion</th>
                            <th class="naranja">Profesor</th>
                            </thead>

                            <tbody>
    <?php
    foreach ($asignaturas as $asignatura) {
        ?>
                                    <tr>
                                        <td><?php echo $asignatura["nombre_asignatura"]; ?></td>
                                        <td><?php echo $asignatura["descripcion_asignatura"]; ?></td>
                                        <td><?php echo $asignatura["duracion_asignatura"]; ?>h</td>
                                        <td><?php echo $asignatura["nombre_profesor"] . " " . $asignatura["apellido_profesor"]; ?></td>
                                    </tr>

        <?php
    }
    ?>


                            </tbody>

                        </table>
<?php } else { ?> 
                        <div class="tablaVacia">
                            No hay asignaturas en el curso <?php echo $detalles["nombre_curso"]; ?>
                        </div>
                    <?php } ?>
                </div>





                <!--Informacion de alumnos del curso-->


                <div id="miTabla">
                    <div class="title">
                        <center><h1>Alumnos</h1></center>
                    </div>
<?php
if (!empty($alumnos)) {
    ?>  
                        <table>
                            <thead>
                            <th class="gris">Nombre</th>
                            <th class="gris">Apellidos</th>
                            <th class="gris">Edad</th>
                            <th class="gris">Fecha</th>
                            <th class="gris">Sexo</th>
                            <th class="gris">Teléfono</th>
                            <th class="gris">Dirección</th>
                            <th class="gris">Curso Matriculado</th>
                            </thead>

                            <tbody>
    <?php
    foreach ($alumnos as $alumno) {
        ?>
                                    <tr>
                                        <td><?php echo $alumno["nombre_alumno"]; ?></td>
                                        <td><?php echo $alumno["apellido_alumno"]; ?></td>
                                        <td><?php echo $alumno["edad_alumno"]; ?></td>
                                        <td><?php echo $alumno["fecha_alumno"]; ?></td>
                                        <td><?php
                                    $alumno["sexo_alumno"];
                                    if ($alumno["sexo_alumno"] == 1) {
                                        echo 'Hombre';
                                    } else if ($alumno["sexo_alumno"] == 2) {
                                        echo 'Mujer';
                                    } else if ($alumno["sexo_alumno"] == 3) {
                                        echo 'Trans';
                                    } else if ($alumno["sexo_alumno"] == 4) {
                                        echo 'Hermafrodita';
                                    } else {
                                        echo 'Sin sexo definido';
                                    }
                                    ?></td>
                                        <td><?php echo $alumno["telefono_alumno"]; ?></td>
                                        <td><?php echo $alumno["direccion_alumno"]; ?></td>
                                        <td><?php echo $alumno["nombre_curso"]; ?></td>
                                    </tr>

        <?php
    }
    ?>


                            </tbody>

                        </table>

<?php } else { ?> 
                        <div class="tablaVacia">
                            No hay alumnos matriculados en el curso <?php echo $detalles["nombre_curso"]; ?>
                        </div>
                    <?php } ?> 
                    <br><center><a href="cursos.php"><div class="cube flip-to-top">
                                <div class="estado-defecto cursos">
                                    <span>Volver</span>
                                </div>
                                <div class="estado-activo cursos">
                                    <span>Volver a lista de cursos</span>

                                </div>
                            </div></a>
                    </center>
                </div>



                <script>/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
                    window.onload = function () {
                        particlesJS.load('dust', '../../js/particles.json', function () {
                            console.log('callback - ../../lib/particles.js config loaded');
                        });
                        var h = $(document).height(); /*establece atributo de height = heightpantalla*/
                        document.getElementById('dust').setAttribute("style", "height:" + h + "px");  /*Esto llama al elemento dust del fondo, y establece atributo de height + heightpantalla:px*/
                    };
                </script>
                </body>
                </html>
