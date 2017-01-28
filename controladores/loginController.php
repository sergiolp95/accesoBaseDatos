<?php

include 'dbManager.php';

$miBBDD = new gestorBD();

$miBBDD ->query("SELECT * FROM usuarios WHERE nombre_usuario=:nombre");
$miBBDD->bind(":nombre",filter_input(INPUT_POST, "usuario"));
$usuario = $miBBDD->single();
if(empty($usuario)){
header("Location: ../vistas/login/login.php?mensaje='No existe ningun usuario con ese nombre en base de datos.'");
}
else{
    $password = filter_input(INPUT_POST, "password");
    if($usuario["contraseña_usuario"] == $password){
        
      header("Location: ../index.php");  
    } 
    else{
       header("Location: ../vistas/login/login.php?mensaje='La contraseña introducida es incorrecta.'"); 
    }
}
