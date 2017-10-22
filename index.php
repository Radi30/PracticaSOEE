<?php
include_once 'conexion.php';
require 'funciones.php';

$msg = array();
session_start();

if (!empty($_POST)) {
    $email = $_POST['nuemail'];
    $cont = $_POST['nucont'];
    
    if (empty($email) || empty($cont)) {
        $msg[] = "Introduzca email y contraseña";
    } else {
        if(login($email, $cont) ){
            header("Location: lista.php");
        } else {
            if (!empty($_SESSION['email'])) {
                if ($email == $_SESSION['email'] && $cont == $_SESSION['cont']){
                    header("Location: lista.php");
                }
            } else {
                $msg[] = "Datos incorrectos";
            }
        }
    }
}

?>


<html>
<head>
<meta charset="utf-8">
<title>Inicio de sesion</title>
<link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
</head>
<body>
	<div class="login-page">
		<div class="form">
			<h1>Inicio de sesion</h1>
			<form class="login-form" id="login" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
				<input type="text" placeholder="Email" name="nuemail" /> 
				<input type="password" placeholder="Contraseña" name="nucont" />
				<button type="submit">Inicar Sesion</button>
				<a href="registrar.php">Registrarse</a>
			</form>
		</div>
	</div>
	<?php echo mensajes($msg); ?>
</body>
</html>