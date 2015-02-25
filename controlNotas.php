<?php
include_once "class/classNotas.php";

$clase = new classNotas();
 if (isset($_POST['accion']) && $_POST['accion'] == "getNotasPeriodico") {
    
     
        echo $clase->getNotasPeriodicoJson();
   
    //header("Location: mapa.php");
} else if (isset($_POST['accion']) && $_POST['accion'] == "getNotasTV") {
    
     
        echo $clase->getNotasTVJson();
   
    //header("Location: mapa.php");
} else if (isset($_POST['accion']) && $_POST['accion'] == "getNotasRadio") {
    
     
        echo $clase->getNotasRadioJson();
   
    //header("Location: mapa.php");
} else if (isset($_POST['getCapas'])) {
    
}

?>
