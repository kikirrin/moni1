<?php
include_once 'properties.php';
include_once 'Database.singleton.php';

class Conexion {

    private $db;

    function __construct() {
        // Creacion de objeto $db
        $this->db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
        // conexion con el servidor de BD
        $this->db->connect();
    }

    function __destruct() {
        $this->db->close();
    }

}
$conexion=new Conexion();
?>