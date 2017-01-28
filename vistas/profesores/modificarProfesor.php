
<?php
include '../../controladores/dbManager.php';

$miBBDD = new gestorBD();

$miBBDD->query("SELECT * FROM profesores WHERE id_profesor=:id");

$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));

$profesor = $miBBDD->single();
?>

<html>  
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Modificar profesor</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilosMenu.css">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../../lib/particles.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <body>
        <div id="dust">
        </div>

        <div id="miTabla">
            <div class="title">
                <center><h1>Modificar Profesor</h1></center>
            </div><br>
            </head>

            <form action="../../controladores/modificarProfesorController.php" method="POST" enctype="multipart/form-data" id="modificarProfesor">   


                <table>
                    <thead>

                    </thead>
                    <tbody>

                    <input type="hidden" name="idProfesor" value="<?php echo $profesor["id_profesor"]; ?>">

                    <tr>
                        <th class="azul">Nombre</th>
                        <td><input type="text" name="nombre" placeholder="Introduzca el nombre" value="<?php echo $profesor["nombre_profesor"]; ?>" required></td>      
                    </tr><tr>   
                        <th class="azul">Apellidos</th>
                        <td><input type="text" name="apellidos" placeholder="Introduzca apellido"  value="<?php echo $profesor["apellido_profesor"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="azul">Calle</th>
                        <td><input type="text" name="calle" placeholder="Introduzca calle"  value="<?php echo $profesor["calle_profesor"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="azul">Numero</th>
                        <td><input type="number" name="numero" placeholder="Introduzca numero"  value="<?php echo $profesor["numero_profesor"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="azul">CP</th>
                        <td><input type="number" name="cp" placeholder="Introduzca codigo postal"  value="<?php echo $profesor["cp_profesor"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="azul">Localidad</th>
                        <td><input type="text" name="localidad" placeholder="Introduzca localidad"  value="<?php echo $profesor["localidad_profesor"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="azul">Provincia</th>
                        <td><input type="text" name="provincia" placeholder="Introduzca provincia"  value="<?php echo $profesor["provincia_profesor"]; ?>" required/></td>
                    </tr><tr>   
                        <th class="azul">Fecha</th>
                        <td><input type="date" name="fecha" placeholder="Introduzca fecha"  value="<?php echo $profesor["fecha_profesor"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="azul">Sexo</th>
                        <td>
                            <input type="radio" name="sexo" value="1"<?php
//Primera forma de chekear el sexo
                            if ($profesor["sexo_profesor"] == 1) {
                                echo "checked";
                            }
                            ?>/>Hombre
                            <br>
                            <input type="radio" name="sexo" value="2"<?php
                            //Segunda forma de chekear el sexo
                            if ($profesor["sexo_profesor"] == 2) {
                                ?>
                                       checked
                                   <?php }
                                   ?>/>Mujer
                            <br>
                            <input type="radio" name="sexo" value="3"<?php
                            //Segunda forma de chekear el sexo
                            if ($profesor["sexo_profesor"] == 3) {
                                ?>
                                       checked
<?php }
?>/>Trans
                            <br>
                            <input type="radio" name="sexo" value="4"<?php
                            //Primera forma de chekear el sexo
                            if ($profesor["sexo_profesor"] == 4) {
                                echo "checked";
                            }
                            ?>/>Hermafrodita</td>
                    </tr><tr>  
                        <th class="azul">Sueldo</th>
                        <td><input type="number" name="sueldo" placeholder="Introduzca sueldo" step="150"  value="<?php echo $profesor["sueldo_profesor"]; ?>" required/></td>
                    </tr>
                    <tr>
                    </tr>


                    </tbody>
                </table>
                <center>
                    <div onclick="submitForm()" class="mano">
                        <div class="cube flip-to-top">
                            <div class="estado-defecto profesores">
                                <input type="submit" hidden id="submit">
                                <span>Modificar</span>
                            </div>
                            <div class="estado-activo profesores">
                                <span>Modificar el profesor elegido</span>

                            </div>
                        </div>
                    </div>
                </center>
                <br>
                <center><a href="profesores.php"><div class="cube flip-to-top">
                            <div class="estado-defecto profesores">
                                <span>Volver</span>
                            </div>
                            <div class="estado-activo profesores">
                                <span>Volver a profesores</span>

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
