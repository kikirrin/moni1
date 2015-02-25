<?php
@session_start();
include_once 'class/classUsuarios.php';
$claseUsuarios = new classUsuarios();
$usuario = $claseUsuarios->validacionUsuario($_POST['username'], $_POST['password']);

if ($usuario != "error") {
    $_SESSION['userMonitoreo'] = $usuario;
    $_SESSION['usernameMonitoreo'] = $_POST['username'];
    $_SESSION['passwordMonitoreo'] = $_POST['password'];
    $_SESSION['nivelMonitoreo'] = $claseUsuarios->getNivelUsuario($_POST['username']);
    $_SESSION['statusMonitoreo'] = "logueado";
    $_SESSION['loggedMonitoreo'] = true;
    header("Location: home.php");
} else {
    header("Location: error.php?username=" . $_POST['username'] . "");
}
?>