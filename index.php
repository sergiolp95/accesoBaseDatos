<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="iconos/favicon.ico"  type="image/x-icon">
        <title>Gestion del centro</title>
        <link rel="stylesheet" type="text/css" href="css/estilosMenu.css">
        <script src="lib/particles.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <!--Empieza fondo-->
        <div id="dust">
</div>
<div class="title">
  <h1>
    <div>
      GESTION 
      <span>del</span>
      <div>CENTRO</div>
    </div>
  </h1>
</div>
<div id="centrada">
<a href="vistas/cursos/cursos.php"><div class="cube flip-to-top">
	  <div class="estado-defecto cursos">
		    <span>Cursos</span>
	  </div>
	  <div class="estado-activo cursos">
              <span>Lista de cursos</span>
                  
  	</div>
</div></a>
    <br>

<a href="vistas/alumnos/alumnos.php"><div class="cube flip-to-top">
	  <div class="estado-defecto alumnos">
		    <span>Alumnos</span>
	  </div>
	  <div class="estado-activo alumnos">
              <span>Lista de alumnos</span>
  	</div>
</div></a>
    <br>


<a href="vistas/profesores/profesores.php"><div class="cube flip-to-top">
	  <div class="estado-defecto profesores">
		    <span>Profesores</span>
	  </div>
	  <div class="estado-activo profesores">
              <span>Lista de profesores</span>
  	</div>
</div></a>
    <br>

<a href="vistas/asignaturas/asignaturas.php"><div class="cube flip-to-top">
	  <div class="estado-defecto asignaturas">
		    <span>Asignaturas</span>
	  </div>
	  <div class="estado-activo asignaturas">
  		  <span>Lista de asignaturas</span>
  	</div>
</div><br><br><br>
<div class="sub-main">
      <a href="vistas/login/login.php"><button class="button-three">Salir</button></a>
    </div>
</div>
</a>




        <script>/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load('dust', 'js/particles.json', function() {
  console.log('callback - lib/jsparticles.js config loaded');
  var h = $(document).height(); /*establece atributo de height = heightpantalla*/
                document.getElementById('dust').setAttribute("style","height:"+h+"px");  /*Esto llama al elemento dust del fondo, y establece atributo de height + heightpantalla:px*/
});
</script>
</body>
</html>
