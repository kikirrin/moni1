<?php
@session_start();
if ((!isset($_SESSION['loggedMonitoreo'])) || ($_SESSION['loggedMonitoreo'] == false) || ($_SESSION['loggedMonitoreo'] == "")) {
    @header("Location: index.php");
}
?>
<!DOCTYPE HTML>
<?php include_once('header.php'); ?>

<div data-role="page" id="portadas" data-title="Monitoreo de medios">
    <div data-role="header" data-theme="c">
        <a href="home.php" data-icon = "home" data-iconpos="notext" data-direction = "back" data-theme="e">Regresar</a>
        <h1>Portadas</h1>
        <a href="" class="ui-btn ui-btn-right ui-btn-icon-notext ui-btn-corner-all ui-icon-refresh" onclick='reload();' ></a>
    </div><!-- /header -->
    <div data-role="content" align="center">

        <h3>Locales</h3>
        <div id="locales">

        </div>
        <h3>Nacionales</h3>

        <div id="nacionales">

        </div>




        <script>

            $(document).one("pagebeforecreate", function() {
                getPortadas();
            });

            function getPortadas() {
                $("#locales").html("");
                $("#nacionales").html("");

                $.ajax({
                    cache: false,
                    type: 'GET',
                    url: 'http://mailmorelos.gob.mx/sintesis/verificacionArchivos.php',
                    dataType: 'jsonp',
                    contentType: 'application/json',
                    data: {
                        accion: "getJsonPortadas"

                    },
                    success: function(json) {
                        if (json === "error") {
                            alert("errorEnResultado");
                        } else {
                            if (json.diariomorelos)
                                $("#locales").append('<a id="diariomorelos"  href="#popupdiariomorelos" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/diariomorelos.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupdiariomorelos" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/diariomorelos.jpg" style="width:85%;"></a></div>');
                            if (json.unionmorelos)
                                $("#locales").append('<a id="unionmorelos"  href="#popupunionmorelos" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/unionmorelos.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupunionmorelos" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/unionmorelos.jpg" style="width:85%;"></a></div>');

                            if (json.jornadamorelos)
                                $("#locales").append('<a id="jornadamorelos"  href="#popupjornadamorelos" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/jornadamorelos.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupjornadamorelos" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/jornadamorelos.jpg" style="width:85%;"></a></div>');

                            if (json.regionalmorelos)
                                $("#locales").append('<a id="regionalmorelos"  href="#popupregionalmorelos" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/regionalmorelos.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupregionalmorelos" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/regionalmorelos.jpg" style="width:85%;"></a></div>');

                            if (json.solcuernavaca)
                                $("#locales").append('<a id="solcuernavaca"  href="#popupsolcuernavaca" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/solcuernavaca.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupsolcuernavaca" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/solcuernavaca.jpg" style="width:85%;"></a></div>');

                            if (json.reforma)
                                $("#nacionales").append('<a id="reforma"  href="#popupreforma" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/reforma.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupreforma" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/reforma.jpg" style="width:85%;"></a></div>');

                            if (json.universal)
                                $("#nacionales").append('<a id="universal"  href="#popupuniversal" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/universal.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupuniversal" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/universal.jpg" style="width:85%;"></a></div>');

                            if (json.jornada)
                                $("#nacionales").append('<a id="jornada"  href="#popupjornada" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/jornada.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupjornada" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/jornada.jpg" style="width:85%;"></a></div>');

                            if (json.milenio)
                                $("#nacionales").append('<a id="milenio"  href="#popupmilenio" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/milenio.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupmilenio" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/milenio.jpg" style="width:85%;"></a></div>');

                            if (json.excelsior)
                                $("#nacionales").append('<a id="excelsior"  href="#popupexcelsior" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/excelsior.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupexcelsior" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/excelsior.jpg" style="width:85%;"></a></div>');

                            if (json.cronica)
                                $("#nacionales").append('<a id="cronica"  href="#popupcronica" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/cronica.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupcronica" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/cronica.jpg" style="width:85%;"></a></div>');

                            if (json.economista)
                                $("#nacionales").append('<a id="economista"  href="#popupeconomista" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/economista.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupeconomista" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/economista.jpg" style="width:85%;"></a></div>');

                            if (json.financiero)
                                $("#nacionales").append('<a id="financiero"  href="#popupfinanciero" data-rel="popup" data-position-to="window" data-transition="fade"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/thumbs/financiero.jpg" class="portada-thumb"></a><div data-role="popup" class="mypopup" id="popupfinanciero" data-theme="none" data-shadow="false" data-overlay-theme="b"><a href="#" data-rel="back"><img src="http://mailmorelos.gob.mx/sintesis/portadas/' + json.fecha + '/financiero.jpg" style="width:85%;"></a></div>');

                            $(".mypopup").each(function() {
//                                alert($(this).html());
                                $(this).popup();
                            });
                           
                        }
                    },
                    error: function(resultado) {
                        alert("resultadoerror=" + resultado);
                    },
                });
            }

            function reload() {
                getPortadas();
            }
        </script>
    </div>
    <?php include_once('footer.php'); ?>
   