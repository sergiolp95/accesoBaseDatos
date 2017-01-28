


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Asignaturas</title>
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
                <center><h1>Asignaturas</h1></center>
            </div><br>
            <?php
            // put your code here
            include "../../controladores/dbManager.php";
            //Creamos el objeto llamando al constructor 
            $miBBDD = new gestorBD();

            //Le lanzamos la consulta a la base de datos 
            $miBBDD->query('SELECT asignaturas.*, profesores.nombre_profesor,profesores.apellido_profesor FROM asignaturas,profesores WHERE asignaturas.id_profesor=profesores.id_profesor');

            //Le pedimos a la Base de datos que nos devuelva lo que ha encontrado y lo guardamos en la variable asignaturas
            $asignaturas = $miBBDD->resultset();
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
                            <td><?php echo $asignatura["duracion_asignatura"]; ?></td>
                            <td><?php echo $asignatura["nombre_profesor"] . " " . $asignatura["apellido_profesor"]; ?></td>
                            <td><a onclick="return confirm('De verdad lo quieres borrar?')" class="borrar" href="../../controladores/borrarAsignatura.php?id=<?php echo $asignatura["id_asignatura"]; ?>">
                                    <img src="../../iconos/del.png" alt="" class="icono"/></a>

                                <br>
                                <a class="modificar" href="modificarAsignatura.php?id=<?php echo $asignatura["id_asignatura"]; ?>">
                                    <img src="../../iconos/edit.png" alt="" class="icono"/></a>

                            </td>
                        </tr>

    <?php
}
?>


                </tbody>

            </table>
            <center><a href="crearAsignatura.php"><div class="cube flip-to-top">
                        <div class="estado-defecto asignaturas">
                            <span>Añadir</span>
                        </div>
                        <div class="estado-activo asignaturas">
                            <span>Crear nueva asignatura</span>

                        </div>
                    </div></a>
            </center>
            <br>
            <center><a href="../../index.php"><div class="cube flip-to-top">
                        <div class="estado-defecto asignaturas">
                            <span>Volver</span>
                        </div>
                        <div class="estado-activo asignaturas">
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
