<?php

@session_start();
include_once 'utils/conexion.php';

class classNotas {

    function getNotaPrensa($id) {

        $Nota = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE id=" . $id . ";");
        while ($fila = $db->fetch($rows)) {
            $Nota['id'] = $fila['Id'];
            $Nota['Nombre'] = $fila['TituloNota'];
            $Nota['Contenido'] = $fila['Nota'];
            if ($fila['Adjunto'] != "")
                $Nota['Foto'] = "http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_prensa/" . $fila['Adjunto'];
            else
                $Nota['Foto'] = "images/no_image.gif";
        }
        return $Nota;
    }

    function getNotaRadioTV($id) {

        $Nota = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE id=" . $id . ";");
        while ($fila = $db->fetch($rows)) {
            $Nota['id'] = $fila['Id'];
            $Nota['Nombre'] = $fila['TituloNota'];
            $Nota['Contenido'] = $fila['Nota'];
            $Nota['Hora'] = $fila['Hora'];
            $Nota['Noticiero'] = $fila['Programa'];
            $Nota['Media'] = $fila['Media'];
            if ($fila['Media'] != "") {
                $tipo = explode(".", $fila['Media']);
                $Nota['MediaTipo'] = $tipo[1];
            } else {
                $Nota['MediaTipo'] = "";
            }
        }
        return $Nota;
    }

    function getNotasPeriodicoJson() {


        $json = new stdClass();
        $json->notasDiario = $this->getNotasDiario();
        $json->notasUnion = $this->getNotasUnion();
        $json->notasJornada = $this->getNotasJornada();
        $json->notasRegional = $this->getNotasRegional();
        $json->notasSolCuernavaca = $this->getNotasCuernavaca();
        $json->notasSolCuautla = $this->getNotasCuautla();

        return json_encode($json);
    }

    function getNotasRadioJson() {


        $json = new stdClass();
        $json->notas = $this->getNotasRadio();

        return json_encode($json);
    }

    function getNotasTVJson() {


        $json = new stdClass();
        $json->notas = $this->getNotasTV();

        return json_encode($json);
    }

    function getNotasDiario() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =1 and Fecha='" . $today . "' and Programa like '%Diario%' and spot='No' and status=1;");
        //echo "SELECT * FROM `monitoreo` WHERE `TipoMedio` =1 and Fecha='" . $today . "' and Programa like '%Diario%' and Nivel >= " . ($nivel - 1) . " and spot='No';";
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
            if ($fila['Adjunto'] != "")
                $Notas[$i]['Foto'] = "http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_prensa/" . $fila['Adjunto'];
            else
                $Notas[$i]['Foto'] = "images/no_image.gif";
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $i++;
        }
        return $Notas;
    }

    function getNotasUnion() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =1 and Fecha='" . $today . "' and Programa like '%Union%' and spot='No' and status=1;");
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
          if ($fila['Adjunto'] != "")
                $Notas[$i]['Foto'] = "http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_prensa/" . $fila['Adjunto'];
            else
                $Notas[$i]['Foto'] = "images/no_image.gif";
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $i++;
        }
        return $Notas;
    }

    function getNotasJornada() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =1 and Fecha='" . $today . "' and Programa like '%Jornada%' and spot='No' and status=1;");
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
            if ($fila['Adjunto'] != "")
                $Notas[$i]['Foto'] = "http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_prensa/" . $fila['Adjunto'];
            else
                $Notas[$i]['Foto'] = "images/no_image.gif";
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $i++;
        }
        return $Notas;
    }

    function getNotasRegional() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =1 and Fecha='" . $today . "' and Programa like '%Regional%' and spot='No' and status=1;");
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
            if ($fila['Adjunto'] != "")
                $Notas[$i]['Foto'] = "http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_prensa/" . $fila['Adjunto'];
            else
                $Notas[$i]['Foto'] = "images/no_image.gif";
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $i++;
        }
        return $Notas;
    }

    function getNotasCuernavaca() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =1 and Fecha='" . $today . "' and Programa like '%Cuernavaca%' and spot='No' and status=1;");
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
            if ($fila['Adjunto'] != "")
                $Notas[$i]['Foto'] = "http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_prensa/" . $fila['Adjunto'];
            else
                $Notas[$i]['Foto'] = "images/no_image.gif";
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $i++;
        }
        return $Notas;
    }

    function getNotasCuautla() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =1 and Fecha='" . $today . "' and Programa like '%Cuautla%' and spot='No' and status=1;");
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
            if ($fila['Adjunto'] != "")
                $Notas[$i]['Foto'] = "http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_prensa/" . $fila['Adjunto'];
            else
                $Notas[$i]['Foto'] = "images/no_image.gif";
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $i++;
        }
        return $Notas;
    }

    function getNotasTV() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =3 and Fecha='" . $today . "' and spot='No' and status=1 order by id desc;");
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $Notas[$i]['Hora'] = $fila['Hora'];
            $Notas[$i]['Medio'] = $fila['Medio'];
            $Notas[$i]['Noticiero'] = $fila['Programa'];
            $Notas[$i]['Media'] = $fila['Media'];
            if ($fila['Media'] != "") {
                $tipo = explode(".", $fila['Media']);
                $Notas[$i]['MediaTipo'] = $tipo[1];
            } else {
                $Notas[$i]['MediaTipo'] = "";
            }
            $i++;
        }
        return $Notas;
    }

    function getNotasRadio() {

        $today = date("Y/m/d");
        //$today = "2014/04/15";
        $i = 0;
        $Notas = "";
        $db = Database::obtain();
        $rows = $db->query("SELECT * FROM `monitoreo` WHERE `TipoMedio` =2 and Fecha='" . $today . "' and spot='No' and status=1 order by id desc;");
        while ($fila = $db->fetch($rows)) {
            $Notas[$i]['id'] = $fila['Id'];
            $Notas[$i]['Nombre'] = $fila['TituloNota'];
            $Notas[$i]['Contenido'] = $fila['Nota'];
            $Notas[$i]['Medio'] = $fila['Medio'];
            $Notas[$i]['Hora'] = $fila['Hora'];
            $Notas[$i]['Noticiero'] = $fila['Programa'];
            $Notas[$i]['Media'] = $fila['Media'];
            $i++;
        }
        return $Notas;
    }

}

?>