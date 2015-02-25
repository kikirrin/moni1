<?php
date_default_timezone_set('America/Mexico_City');
if (isset($_GET['accion']) && $_GET['accion'] == "getJsonPortadas") {
    $json = new stdClass();
    $json->diariomorelos = existePortada("diariomorelos");
    $json->unionmorelos = existePortada("unionmorelos");
    $json->jornadamorelos = existePortada("jornadamorelos");
    $json->regionalmorelos = existePortada("regionalmorelos");
    $json->solcuernavaca = existePortada("solcuernavaca");
    $json->reforma = existePortada("reforma");
    $json->universal = existePortada("universal");
    $json->jornada = existePortada("jornada");
    $json->milenio = existePortada("milenio");
    $json->excelsior = existePortada("excelsior");
    $json->cronica = existePortada("cronica");
    $json->economista = existePortada("economista");
    $json->financiero = existePortada("financiero");
    $json->fecha=date("Y-m-d");
    header('Content-type: application/json; charset=utf-8');
    echo $_GET['callback'] . '(' . json_encode($json) . ')';
} else if (isset($_GET['accion']) && $_GET['accion'] == "getJsonPeriodicos") {
    $json = new stdClass();
    $json->diariomorelos = existenPeriodicos("diariomorelos");
    $json->unionmorelos = existenPeriodicos("unionmorelos");
    $json->jornadamorelos = existenPeriodicos("jornadamorelos");
    $json->regionalmorelos = existenPeriodicos("regionalmorelos");
    $json->solesmorelos = existenPeriodicos("solesmorelos");
    $json->capitalmorelos = existenPeriodicos("capitalmorelos");
    $json->nacional = existeSintesisNacional();
    $json->fecha=date("Y-m-d");
    $json->fechaN=strtolower(date("dMy"));
    header('Content-type: application/json; charset=utf-8');
    echo $_GET['callback'] . '(' . json_encode($json) . ')';
}

function existePortada($portada) {
    if (file_exists("portadas/" . date("Y-m-d") . "/thumbs/$portada.jpg")) {
        return true;
    } else {
        return false;
    }
}

function existenPeriodicos($periodico) {
    if (file_exists("periodicos/" . date("Y-m-d") . "/$periodico.pdf")) {
        return true;
    } else {
        return false;
    }
}

function existeSintesisNacional() {
    if (file_exists("sintesisnacional/SintesisNacional_" . strtolower(date("dMy")) . ".pdf")) {
        return true;
    } else {
        return false;
    }
}

?>
