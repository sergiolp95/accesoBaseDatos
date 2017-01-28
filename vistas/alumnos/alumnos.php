


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Alumnos</title>
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
                <center><h1>Alumnos</h1></center>
            </div><br>
            <?php
            // put your code here
            include "../../controladores/dbManager.php";
            //Creamos el objeto llamando al constructor 
            $miBBDD = new gestorBD();

            //Le lanzamos la consulta a la base de datos 
            $miBBDD->query('SELECT alumnos.*, cursos.nombre_curso FROM alumnos,cursos WHERE alumnos.id_curso=cursos.id_curso');

            //Le pedimos a la Base de datos que nos devuelva lo que ha encontrado y lo guardamos en la variable alumnos
            $alumnos = $miBBDD->resultset();
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
                        <tr  >
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
                            <td><a onclick="return confirm('De verdad lo quieres borrar?')" class="borrar"href="../../controladores/borrarAlumno.php?id=<?php echo $alumno["id_alumno"]; ?>">
                                    <img src="../../iconos/del.png" alt="" class="icono"/></a>

                                <br>
                                <a class="modificar" href="modificarAlumno.php?id=<?php echo $alumno["id_alumno"]; ?>">
                                    <img src="../../iconos/edit.png" alt="" class="icono"/></a>

                            </td>
                        </tr>

                        <?php
                    }
                    ?>


                </tbody>

            </table>
            <center><a href="crearAlumno.php"><div class="cube flip-to-top">
                        <div class="estado-defecto alumnos">
                            <span>Añadir</span>
                        </div>
                        <div class="estado-activo alumnos">
                            <span>Crear nuevo alumno</span>

                        </div>
                    </div></a>
            </center>
            <br>
            <center><a href="../../index.php"><div class="cube flip-to-top">
                        <div class="estado-defecto alumnos">
                            <span>Volver</span>
                        </div>
                        <div class="estado-activo alumnos">
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
