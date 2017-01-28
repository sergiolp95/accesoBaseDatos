


<head>
    <title>Crear Asignatura</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <center><h1>Crear Nueva Asignatura</h1></center>
        </div><br>
        <?php
        include '../../controladores/dbManager.php';

        $crearAsignatura = new gestorBD();

        $crearAsignatura->query("SELECT profesores.id_profesor,profesores.nombre_profesor, profesores.apellido_profesor FROM profesores");
        $asignatura = $crearAsignatura->resultset();
        ?>

        <form action="../../controladores/crearAsignaturaController.php" method="POST" enctype="multipart/form-data" id="crearAsignatura"> <!--action es donde envia las cosas el form, el name es siempre obligatorio para diferenciar cada form y method es la forma en la que lo envia -->
            <table>
                <thead>

                </thead>
                <tbody>

                    <tr>
                        <th class="naranja">Nombre</th>
                        <td><input type="text" name="nombre" placeholder="Introduzca el nombre" required/></td> <!--type es para que sea texto, checkbox etc... name para saber identificarlo y placeholder es para aclaraciones -->
                    </tr><tr>   
                        <th class="naranja">Descripción</th>
                        <td><input type="text" name="descripcion" placeholder="Introduzca una descripcion" required/></td>
                    </tr><tr>  
                        <th class="naranja">Duración</th>
                        <td><input type="number" name="duracion" placeholder="Horas" step="25" required min="25" max="1000"/></td>
                    </tr><tr>  
                        <th class="naranja">Profesor</th>
                        <td> <?php
        foreach ($asignatura as $as) {
            ?>
                                <input type="radio" name="idProfe" value="<?php echo $as["id_profesor"]; ?>" required/>
                                <?php
                                echo $as["nombre_profesor"];
                                echo " " . $as["apellido_profesor"];
                                ?><br>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                </tbody>
            </table>
            <center><div onclick="submitForm()" class="mano">
                    <div class="cube flip-to-top">
                        <div class="estado-defecto asignaturas">
                            <span>Crear</span>
                        </div>
                        <div class="estado-activo asignaturas">
                            <input type="submit" hidden id="submit">
                            <span>Añade nueva asignatura</span>

                        </div>
                    </div>
                </div>
            </center>
            </center>
            <br>
            <center><a href="asignaturas.php"><div class="cube flip-to-top">
                        <div class="estado-defecto asignaturas">
                            <span>Volver</span>
                        </div>
                        <div class="estado-activo asignaturas">
                            <span>Volver a asignaturas</span>

                        </div>
                    </div></a>
            </center>
        </form> 
    </div> 
    <script>/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        window.onload = function () {
            particlesJS.load('dust', '../../js/particles.json', function () {
                console.log('callback - ../../lib/particles.js config loaded');
                var h = $(document).height(); /*establece atributo de height = heightpantalla*/
                document.getElementById('dust').setAttribute("style", "height:" + h + "px");  /*Esto llama al elemento dust del fondo, y establece atributo de height + heightpantalla:px*/
            });
        };


        /////esto en jquery
//            $( "#submit" ).click(function() {
//                $( "#crearCurso" ).submit();
//              });

        ////esto en js
        function submitForm() {

            document.getElementById("submit").click();

        }


    </script>
</body>
</html>
