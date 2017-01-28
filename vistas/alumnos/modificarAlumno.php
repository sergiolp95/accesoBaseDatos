



<?php
include '../../controladores/dbManager.php';

$miBBDD = new gestorBD();

$miBBDD->query("SELECT * FROM alumnos WHERE alumnos.id_alumno=:id");

$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));

$alumno = $miBBDD->single();

$miBBDD->query("SELECT id_curso, nombre_curso FROM cursos");

$cursos = $miBBDD->resultset();
?>

<html>  
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Modificar alumno</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilosMenu.css">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../../lib/particles.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <body>
        <div id="dust">
        </div>

        <div id="miTabla">
            <div class="title">
                <center><h1>Modificar Alumno</h1></center>
            </div><br>
            </head>

            <form action="../../controladores/modificarAlumnoController.php" method="POST" enctype="multipart/form-data" id="modificarAlumno">   


                <table>
                    <thead>

                    </thead>
                    <tbody>

                    <input type="hidden" name="idAlumno" value="<?php echo $alumno["id_alumno"]; ?>">

                    <tr>
                        <th class="gris">Nombre</th>
                        <td><input type="text" name="nombre" placeholder="Introduzca el nombre" value="<?php echo $alumno["nombre_alumno"]; ?>" required></td>      
                    </tr><tr>   
                        <th class="gris">Apellidos</th>
                        <td><input type="text" name="apellidos" placeholder="Introduzca apellido"  value="<?php echo $alumno["apellido_alumno"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="gris">Edad</th>
                        <td><input type="text" name="edad" placeholder="Edad" min="1" max="60" value="<?php echo $alumno["edad_alumno"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="gris">Fecha</th>
                        <td><input type="date" name="fecha" value="<?php echo $alumno["fecha_alumno"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="gris">Sexo</th>
                        <td>
                            <input type="radio" name="sexo" value="1"<?php
//Primera forma de chekear el sexo
if ($alumno["sexo_alumno"] == 1) {
    echo "checked";
}
?>/>Hombre
                            <br>
                            <input type="radio" name="sexo" value="2"<?php //Segunda forma de chekear el sexo
                            if ($alumno["sexo_alumno"] == 2) {
    ?>
                                       checked
                            <?php }
                            ?>/>Mujer
                            <br>
                            <input type="radio" name="sexo" value="3"<?php //Segunda forma de chekear el sexo
                            if ($alumno["sexo_alumno"] == 3) {
                                ?>
                                       checked
                                   <?php }
                                   ?>/>Trans
                            <br>
                            <input type="radio" name="sexo" value="4"<?php
                                   //Primera forma de chekear el sexo
                                   if ($alumno["sexo_alumno"] == 4) {
                                       echo "checked";
                                   }
                                   ?>/>Hermafrodita</td>
                    </tr><tr>  
                        <th class="gris">Telefono</th>
                        <td><input type="text" name="telefono" placeholder="Introduzca localidad"  value="<?php echo $alumno["telefono_alumno"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="gris">Direccion</th>
                        <td><input type="text" name="direccion" placeholder="Introduzca provincia"  value="<?php echo $alumno["direccion_alumno"]; ?>" required/></td>
                    </tr><tr>   
                        <th class="gris">Curso Matriculado</th>
                        <td> <?php
                            foreach ($cursos as $curso) {
                                ?>
                                <input type="radio" name="idCurso" value="<?php echo $curso["id_curso"]; ?>" required <?php
                            if ($curso["id_curso"] == $alumno["id_curso"]) {
                                echo "checked";
                            }
                                ?>/>
                                <?php echo $curso["nombre_curso"]; ?><br>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <center>
                    <div onclick="submitForm()" class="mano">
                        <div class="cube flip-to-top">
                            <div class="estado-defecto alumnos">
                                <input type="submit" hidden id="submit">
                                <span>Modificar</span>
                            </div>
                            <div class="estado-activo alumnos">
                                <span>Modificar el alumno elegido</span>

                            </div>
                        </div>
                    </div>
                </center>
                <br>
                <center><a href="alumnos.php"><div class="cube flip-to-top">
                            <div class="estado-defecto alumnos">
                                <span>Volver</span>
                            </div>
                            <div class="estado-activo alumnos">
                                <span>Volver a alumnos</span>

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
