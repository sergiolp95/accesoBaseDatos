


<head>
    <title>Crear Alumno</title>
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
            <center><h1>Crear Nuevo Alumno</h1></center>
        </div><br>
        <?php
        include '../../controladores/dbManager.php';

        $crearAlumno = new gestorBD();

        $crearAlumno->query("SELECT id_curso,nombre_curso FROM cursos");
        $alumno = $crearAlumno->resultset();
        ?>

        <form action="../../controladores/crearAlumnoController.php" method="POST" enctype="multipart/form-data" id="crearAlumno"> <!--action es donde envia las cosas el form, el name es siempre obligatorio para diferenciar cada form y method es la forma en la que lo envia -->
            <table>
                <thead>




                </thead>
                <tbody>

                    <tr>
                        <th class="gris">Nombre</th>
                        <td><input type="text" name="nombre" placeholder="Introduzca el nombre" required/></td> <!--type es para que sea texto, checkbox etc... name para saber identificarlo y placeholder es para aclaraciones -->
                    </tr><tr>   
                        <th class="gris">Apellidos</th>
                        <td><input type="text" name="apellidos" placeholder="Introduzca apellido" required/></td>
                    </tr><tr>  
                        <th class="gris">Edad</th>
                        <td><input type="number" name="edad" min="1" max="60" placeholder="Edad" required/></td>
                    </tr><tr>   
                        <th class="gris">Fecha</th>
                        <td><input type="date" name="fecha" required/></td>
                    </tr><tr>  
                        <th class="gris">Sexo</th>
                        <td><input type="radio" name="sexo" value="1" checked/>Hombre<br>
                            <input type="radio" name="sexo" value="2"/>Mujer<br>
                            <input type="radio" name="sexo" value="3"/>Trans<br>
                            <input type="radio" name="sexo" value="4"/>Hermafrodita</td>
                    </tr>><tr>  
                        <th class="gris">Telefono</th>
                        <td><input type="number" name="telefono" placeholder="Introduzca telefono" required/></td>
                    </tr><tr>  
                        <th class="gris">Direccion</th>
                        <td><input type="text" name="direccion" placeholder="Introduzca direccion" required/></td>
                    </tr><tr>  
                        <th class="gris">Curso Matriculado</th>
                        <td> <?php
        foreach ($alumno as $as) {
            ?>
                                <input type="radio" name="idCursos" value="<?php echo $as["id_curso"]; ?>" required/>
                                <?php echo $as["nombre_curso"]; ?><br>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                </tbody>
            </table>
            <center><div onclick="submitForm()" class="mano">
                    <div class="cube flip-to-top">
                        <div class="estado-defecto alumnos">
                            <span>Crear</span>
                        </div>
                        <div class="estado-activo alumnos">
                            <input type="submit" hidden id="submit">
                            <span>Añade nuevo alumno</span>

                        </div>
                    </div>
                </div>
            </center>
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
