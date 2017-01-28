


<?php
include '../../controladores/dbManager.php';

$miBBDD = new gestorBD();

$miBBDD->query("SELECT * FROM asignaturas WHERE id_asignatura=:id");

$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));

$asignatura = $miBBDD->single();

$miBBDD->query("SELECT profesores.id_profesor,profesores.nombre_profesor, profesores.apellido_profesor  FROM profesores");

$profesores = $miBBDD->resultset();
?>

<!--$miBBDD = new gestorBD();

        $miBBDD ->query("SELECT * FROM alumnos WHERE alumnos.id_alumno=:id");
        
        $miBBDD->bind(":id", filter_input(INPUT_GET,"id"));

        $alumno = $miBBDD->single();
        
        $miBBDD->query("SELECT profesores.id_profesor,profesores.nombre_profesor, profesores.apellido_profesor  FROM profesores");
        
        $cursos = $miBBDD->resultset();
        

?>-->

<html>  
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Modificar asignatura</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilosMenu.css">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../../lib/particles.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <body>
        <div id="dust">
        </div>

        <div id="miTabla">
            <div class="title">
                <center><h1>Modificar Asignatura</h1></center>
            </div><br>
            </head>

            <form action="../../controladores/modificarAsignaturaController.php" method="POST" enctype="multipart/form-data" id="modificarProfesor">   


                <table>
                    <thead>

                    </thead>
                    <tbody>

                    <input type="hidden" name="id" value="<?php echo $asignatura["id_asignatura"]; ?>">

                    <tr>
                        <th class="naranja">Nombre</th>
                        <td><input type="text" name="nombre" placeholder="Introduzca el nombre" value="<?php echo $asignatura["nombre_asignatura"]; ?>" required></td>      
                    </tr><tr>   
                        <th class="naranja">Descripcion</th>
                        <td><input type="text" name="descripcion" placeholder="Introduzca apellido"  value="<?php echo $asignatura["descripcion_asignatura"]; ?>" required/></td>
                    </tr><tr>  
                        <th class="naranja">Duracion</th>
                        <td><input type="number" name="duracion" placeholder="Horas" value="<?php echo $asignatura["duracion_asignatura"]; ?>" required step="25" min="25" max="1000"/></td>
                    </tr><tr>  
                        <th class="naranja">Profesor</th>
                        <td> <?php
foreach ($profesores as $as) {
    ?>
                                <input type="radio" name="idProfe" value="<?php echo $as["id_profesor"]; ?>" required <?php
                                if ($as["id_profesor"] == $asignatura["id_profesor"]) {
                                    echo 'checked';
                                }
                                ?>/>
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
                <center>
                    <div onclick="submitForm()" class="mano">
                        <div class="cube flip-to-top">
                            <div class="estado-defecto asignaturas">
                                <input type="submit" hidden id="submit">
                                <span>Modificar</span>
                            </div>
                            <div class="estado-activo asignaturas">
                                <span>Modificar la asignatura elegido</span>

                            </div>
                        </div>
                    </div>
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
