<?php

@session_start();
include_once 'utils/conexion.php';

class classUsuarios {

    function validacionUsuario($usuario, $password) {
        $db = Database::obtain();
        $sql = "SELECT name, apellidop FROM `tb_users` WHERE login ='" . $usuario . "' and password='" . $password . "' and status='1';";
        $row = $db->query_first($sql);
//        echo "<br>sql=".$sql;
        
        if (isset($_SESSION['userMonitoreo'])) {
                $usuario = "session-" . $_SESSION['usernameMonitoreo'];
            } else {
                $usuario = "post-" . $_POST['username'];
            }
        if ($row['name'] != "") {
            $idLog = $this->insertLog("login", $usuario);
            return $row['name'] . " " . $row['apellidop'];
        } else {
            return "error";
        }
    }

    function insertLog($actividad, $usuario) {
        $db = Database::obtain();
         $datos['app'] = "Monitoreo";
        $datos['idUsuario'] = $usuario;
        $datos['actividad'] = $actividad;
        $datos['browser'] = $_SERVER['HTTP_USER_AGENT'];
        $datos['ip'] = getIpReal();
        return $db->insert("login_mobile", $datos);
    }

    function getNivelUsuario($usuario) {
        $db = Database::obtain();
        $sql = "select cod_group from tb_users_x_groups where login='" . $usuario . "' order by cod_group;";
        $row = $db->query_first($sql);
        if ($row['cod_group'] != "") {
            return $row['cod_group'];
        } else {
            return "/";
        }
    }

}


function getIpReal() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'] . "http";
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] . "xfor";
    } else {
        $ip = $_SERVER['REMOTE_ADDR'] . "remote";
    }
    return $ip;
}

?>
