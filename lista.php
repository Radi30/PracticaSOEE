<?php
include_once 'conexion.php';
session_start();

/*echo "Hola " . $_SESSION['usuario'][0];*/

global $db;
$query = "SELECT * FROM usuarios";
$result = $db->query($query);

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inicio de sesion</title>
        <link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
    </head>
</html>

<?php
echo "<br><table> \n";
echo "<tr><th>Nombre</th><th>Edad</th><th>E-Mail</th><th>Contraseña</th></tr> \n";
while ($row = mysqli_fetch_row($result)) {
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr> \n";
}
echo "</table> \n";
?>

<a href="index.php" ><h1 style="text-align: center;">Volver</h1></a>