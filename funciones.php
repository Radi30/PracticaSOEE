<?php

function isNull($nombre, $edad, $email, $cont)
{
    if (strlen(trim($nombre)) < 1 || strlen(trim($edad)) < 1 || strlen(trim($email)) < 1 || strlen(trim($cont)) < 1) {
        return true;
    } else {
        return false;
    }
}

function emailExiste($email)
{
    global $db;
    
    $query = "SELECT * from usuarios where email='" . $email . "'";
    $result = $db->query($query);
    $row = mysqli_fetch_array($result);
    if ($row['email'] == $email) {
        return true;
    } else {
        return false;
    }
}

function mensajes($msg)
{
    if (count($msg) > 0) {
        echo "<div id='mensaje' class='mensajes'>";
        foreach ($msg as $mensaje) {
            echo "<p>" . $mensaje . "</p>";
        }
        echo "</div>";
    } else {
        return;
    }
}

function registraUsuario($nombre, $edad, $email, $cont)
{
    global $db;
    
    $query = "INSERT INTO usuarios (nombre, edad, email, cont) VALUES ('" . $nombre . "', '" . $edad . "', '" . $email . "', '" . $cont . "');";
    $db->query($query);
}

function login($email, $cont)
{
    global $db;
    
    $query = "SELECT * from usuarios where email='" . $email . "'";
    $result = $db->query($query);
    
    if ($row = mysqli_fetch_array($result)) {
        if ($row['cont'] == $cont) {
            /*session_start();
            $_SESSION['usuario'] = $row;*/
            return true;
        } else {
            return false;
        }
    }
}