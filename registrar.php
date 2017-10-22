<?php
include_once 'conexion.php';
require 'funciones.php';

$msg = array();
if (!empty($_POST)) {
    $nombre = $_POST['nunombre'];
    $edad = $_POST['nuedad'];
    $email = $_POST['nuemail'];
    $cont = $_POST['nucont'];
    $tipoSesion = $_POST['tipoSesion'];
    
    if (isNull($nombre, $edad, $email, $cont)) {
        $msg[] = "Debe rellenar todos los campos";
    }
    
    if ($tipoSesion == "persistente") {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg[] = "Dirección de correo inválida";
        }
        
        if (emailExiste($email)) {
            $msg[] = "El correo electronico $email ya existe";
        }
        
        if (count($msg) == 0) {
            registraUsuario($nombre, $edad, $email, $cont);
            $msg[] = "Usuario registrado correctamente";
        }
    } else {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['cont'] = $cont;
        $msg[] = "Usuario temporal creado correctamente";
    }
    
    
}

?>


<html>
<head>
<meta charset="utf-8">
<title>Alta de usuario</title>
<link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
</head>

<body>
	<div class="login-page">
		<div class="form">
			<h1>Alta de usuario</h1>
			<form class="login-form" id="registro" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
				<input type="text" placeholder="Nombre" name="nunombre" /> 
				<input type="number" placeholder="Edad" name="nuedad" /> 
				<input type="text" placeholder="Email" name="nuemail" /> 
				<input type="password" placeholder="Contraseña" name="nucont" />
				Tipo de sesion:
				<select name="tipoSesion">
                    <option value="persistente" selected>Persistente</option> 
                    <option value="volatil">Volatil</option>
                </select>
				<button type="submit">Registrarse</button>
				<button type="reset">Limpiar</button>
				<a href="index.php">Volver</a>
			</form>
		</div>
	</div>
	<?php echo mensajes($msg); ?>
</body>
</html>