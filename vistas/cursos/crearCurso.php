

<html>
    <head>
        <title>Crear Curso</title>
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
                <center><h1>Crear Nuevo Curso</h1></center>
            </div><br>
            <?php
            include '../../controladores/dbManager.php';

            $miCrearCurso = new gestorBD();

            $miCrearCurso->query("SELECT nombre_asignatura,id_asignatura FROM asignaturas");
            $asignaturas = $miCrearCurso->resultset();
            ?>



            <form action="../../controladores/crearCursoController.php" method="POST" enctype="multipart/form-data" id="crearCurso"> <!--action es donde envia las cosas el form, el name es siempre obligatorio para diferenciar cada form , method es la forma en la que lo envia -->
                <!-- enctype: es necesario para trabajar con el envio de archivos en un formulario -->
                <table>
                    <thead>

                    </thead>
                    <tbody>

                        <tr>
                            <th class="rojo">Nombre curso</th>
                            <td><input type="text" name="nombreCurso" placeholder="Introduzca el nombre" required/></td> <!--type es para que sea texto, checkbox etc... name para saber identificarlo y placeholder es para aclaraciones -->

                        </tr>


                        <tr>
                            <th class="rojo">Foto:</th>
                            <td><input type="file" name="foto"/></td>
                        </tr>
                        <tr>
                            <th class="rojo">Asignaturas</th>
                            <td> <?php
                                foreach ($asignaturas as $asignatura) {
                                    ?>
                                    <input type="checkbox" name="asignaturas[]" value="<?php echo $asignatura["id_asignatura"]; ?>"/>
                                    <?php echo $asignatura["nombre_asignatura"]; ?><br>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <center><div onclick="submitForm()" class="mano">
                        <div class="cube flip-to-top" id="submit" >
                            <div class="estado-defecto cursos">
                                <span>Crear</span>
                            </div>
                            <div class="estado-activo cursos">
                                <span>Añade nuevo curso</span>

                            </div>
                        </div>
                    </div>
                </center>
                <br>
                <center><a href="cursos.php"><div class="cube flip-to-top">
                            <div class="estado-defecto cursos">
                                <span>Volver</span>
                            </div>
                            <div class="estado-activo cursos">
                                <span>Volver a cursos</span>

                            </div>
                        </div></a>
                </center>
            </form> 
        </div>  
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

            document.getElementById("crearCurso").submit();

        }
    </script>
</body>
</html>
