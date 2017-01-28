


<?php
//Paso 1.- Pedir a la BBDD la información del profesor seleccionado
include '../../controladores/dbManager.php';

$miBBDD = new gestorBD();



$miBBDD->query("SELECT cursos.nombre_curso, cursos.id_curso, cursos.imagen_curso FROM cursos WHERE id_curso=:id");
$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));
$curso = $miBBDD->single();


$miBBDD->query("SELECT nombre_asignatura,id_asignatura FROM asignaturas");
$asignaturas = $miBBDD->resultset();
$miBBDD->query("SELECT * FROM cursos_asignaturas WHERE id_curso=:id");
$miBBDD->bind(":id", filter_input(INPUT_GET, "id"));
$cursos_asignaturas = $miBBDD->resultset();
?>
<html>  
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <title>Modificar curso</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilosMenu.css">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../../lib/particles.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <body>
        <div id="dust">
        </div>

        <div id="miTabla">
            <div class="title">
                <center><h1>Modificar Curso</h1></center>
            </div><br>
            </head>

            <form action="../../controladores/modificarCursoController.php" method="POST" enctype="multipart/form-data" id="modificarCurso">   


                <table>
                    <thead>

                    </thead>
                    <tbody>

                    <input type="hidden" name="idCurso" value="<?php echo $curso["id_curso"]; ?>">
                    <tr>
                        <th class="rojo">Nombre curso</th>
                        <td><input type="text" name="nombreCurso" placeholder="Introduzca el nombre" value="<?php echo $curso["nombre_curso"]; ?>"></td> 

                    </tr>


                    <tr>
                        <th class="rojo">Foto:</th>
                        <td>
                            <img src="../../img/<?php echo $curso["imagen_curso"]; ?>" width="60" >

<?php
if (!empty($curso["imagen_curso"])) {
    echo "<span>" . $curso["imagen_curso"] . "</span>";
}
?> 
                            <input type="hidden" name="fotoVieja" value="<?php echo $curso["imagen_curso"]; ?>" />
                            <input type="file" name="foto"/>

                        </td>
                    </tr>
                    <tr>
                        <th class="rojo">Asignaturas</th>
                        <td> <?php
                            foreach ($asignaturas as $asignatura) {
                                ?>
                                <input type="checkbox" name="asignaturas[]" value="<?php echo $asignatura["id_asignatura"]; ?>"
    <?php
    foreach ($cursos_asignaturas as $cursos_asignatura) {
        if ($asignatura["id_asignatura"] == $cursos_asignatura["id_asignatura"]) {
            echo "checked='true'";
        }
    }
    ?>
                                       />
                                <?php echo $asignatura["nombre_asignatura"]; ?><br>
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
                            <div class="estado-defecto cursos">
                                <span>Modificar</span>
                            </div>
                            <div class="estado-activo cursos">
                                <span>Modificar el curso elegido</span>

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

                document.getElementById("modificarCurso").submit();

            }
        </script>

    </body>

</html>
