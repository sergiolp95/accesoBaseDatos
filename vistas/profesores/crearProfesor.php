

<head>
    <title>Crear Profesor</title>
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
            <center><h1>Crear Nuevo Profesor</h1></center>
        </div><br>

        <form action="../../controladores/crearProfesorController.php" method="POST" enctype="multipart/form-data" id="crearProfe"> <!--action es donde envia las cosas el form, el name es siempre obligatorio para diferenciar cada form y method es la forma en la que lo envia -->
            <table>
                <thead>




                </thead>
                <tbody>

                    <tr>
                        <th class="azul">Nombre</th>
                        <td><input type="text" name="nombre" placeholder="Introduzca el nombre" required/></td> <!--type es para que sea texto, checkbox etc... name para saber identificarlo y placeholder es para aclaraciones -->
                    </tr><tr>   
                        <th class="azul">Apellidos</th>
                        <td><input type="text" name="apellidos" placeholder="Introduzca apellido" required/></td>
                    </tr><tr>  
                        <th class="azul">Calle</th>
                        <td><input type="text" name="calle" placeholder="Introduzca  calle" required/></td>
                    </tr><tr>  
                        <th class="azul">Numero</th>
                        <td><input type="number" name="numero" placeholder="Introduzca numero" required/></td>
                    </tr><tr>  
                        <th class="azul">CP</th>
                        <td><input type="number" name="cp" placeholder="Introduzca codigo postal" required/></td>
                    </tr><tr>  
                        <th class="azul">Localidad</th>
                        <td><input type="text" name="localidad" placeholder="Introduzca localidad" required/></td>
                    </tr><tr>  
                        <th class="azul">Provincia</th>
                        <td><input type="text" name="provincia" placeholder="Introduzca provincia" required/></td>
                    </tr><tr>   
                        <th class="azul">Fecha</th>
                        <td><input type="date" name="fecha" placeholder="Introduzca fecha" required/></td>
                    </tr><tr>  
                        <th class="azul">Sexo</th>
                        <td><input type="radio" name="sexo" value="1" checked/>Hombre<br>
                            <input type="radio" name="sexo" value="2"/>Mujer<br>
                            <input type="radio" name="sexo" value="3"/>Trans<br>
                            <input type="radio" name="sexo" value="4"/>Hermafrodita</td>
                    </tr><tr>  
                        <th class="azul">Sueldo</th>
                        <td><input type="number" name="sueldo" placeholder="Introduzca sueldo" step="150" required min="150" max="9000"/></td>
                    </tr>
                    <tr>
                    </tr>

                </tbody>
            </table>
            <center><div onclick="submitForm()" class="mano">
                    <div class="cube flip-to-top">
                        <div class="estado-defecto profesores">
                            <span>Crear</span>
                        </div>
                        <div class="estado-activo profesores">
                            <input type="submit" hidden id="submit">
                            <span>Añade nuevo profesor</span>

                        </div>
                    </div>
                </div>
            </center>
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
            });
            var h = $(document).height(); /*establece atributo de height = heightpantalla*/
            document.getElementById('dust').setAttribute("style", "height:" + h + "px");  /*Esto llama al elemento dust del fondo, y establece atributo de height + heightpantalla:px*/
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
