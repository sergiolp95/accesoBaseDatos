<!DOCTYPE html>

<html lang="en">
<head>
	<title>Login</title>
        <meta charset="UTF-8">
        <link rel="icon" href="../../iconos/favicon.ico"  type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../../css/login.css" media="screen" />
        <link href="../../css/estilosMenu.css" rel="stylesheet" type="text/css"/>
        <script src="../../lib/particles.js" type="text/javascript"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
</head>
<body><div id="dust"></div>
	<div class="login">
            
	<h1>Login</h1>
    <form action="../../controladores/loginController.php" method="POST" enctype="multipart/form-data">
    	<input type="text" name="usuario" placeholder="Usuario" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Entrar.</button>
        
    </form>
</div>
    <script>
        window.onload = function () {
            particlesJS.load('dust', '../../js/particles.json', function () {
                console.log('callback - ../../lib/particles.js config loaded');
            });
            var h = $(document).height(); /*establece atributo de height = heightpantalla*/
            document.getElementById('dust').setAttribute("style", "height:" + h + "px");  /*Esto llama al elemento dust del fondo, y establece atributo de height + heightpantalla:px*/
            var m = getParameterByName('mensaje', window.location.href);        /*recogemos la var de la URL*/
            if(m !== "" && m !== null){         /*Si el mensaje viene lleno*/
                alert(m);        /*Alert del error*/
            }
    };
    
    
    
    function getParameterByName(name, url) {
        if (!url) {
          url = window.location.href;
        }
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    </script>
</body>
</html>