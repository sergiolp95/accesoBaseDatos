
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Profesores</title>
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
                <center><h1>Listado de Profesores</h1></center>
            </div><br>
            <?php
            // put your code here
            include "../../controladores/dbManager.php";

            //Creamos el objeto llamando al constructor 
            $miBBDD = new gestorBD();

            //Le lanzamos la consulta a la base de datos 
            $miBBDD->query('SELECT * FROM profesores');

            //Le pedimos a la Base de datos que nos devuelva lo que ha encontrado y lo guardamos en la variable cursos
            $profesores = $miBBDD->resultset();
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
                            <td>
                                <a onclick="return confirm('De verdad lo quieres borrar?')" class="borrar" href="../../controladores/borrarProfesor.php?id=
                                   <?php echo $profesor["id_profesor"]; ?>"><img src="../../iconos/del.png" class="icono"/></a><br>
                                <a class="modificar"href="modificarProfesor.php?id=<?php echo $profesor["id_profesor"]; ?>"><img src="../../iconos/edit.png" class="icono"/></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <center><a href="crearProfesor.php"><div class="cube flip-to-top">
                        <div class="estado-defecto profesores">
                            <span>Añadir</span>
                        </div>
                        <div class="estado-activo profesores">
                            <span>Crear nuevo profesor</span>

                        </div>
                    </div></a>
            </center>
            <br>
            <center><a href="../../index.php"><div class="cube flip-to-top">
                        <div class="estado-defecto profesores">
                            <span>Volver</span>
                        </div>
                        <div class="estado-activo profesores">
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
