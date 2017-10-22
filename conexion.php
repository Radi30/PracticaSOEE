<?php
define('DB_SERVER', 'localhost');
define('DB_NAME', 'id3329557_usuarios');
define('DB_USER', 'id3329557_admin');
define('DB_PASS', 'admin');

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
}
?>