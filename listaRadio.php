<?php
@session_start();
if ((!isset($_SESSION['loggedMonitoreo'])) || ($_SESSION['loggedMonitoreo'] == false) || ($_SESSION['loggedMonitoreo'] == "")) {
    @header("Location: index.php");
}

?>
<!DOCTYPE HTML>
<!-- <html manifest="cache.manifest">-->


<?php include_once('header.php'); ?>

<div data-role="page" id="page" data-title="Monitoreo de medios" data-theme="c">
    <div data-role="header" >
        <a href="home.php" class="ui-btn ui-btn-left ui-btn-icon-notext ui-btn-corner-all ui-icon-home" data-direction = "back"></a>

        <h1>Radio</h1>
        <a href="" class="ui-btn ui-btn-right ui-btn-icon-notext ui-btn-corner-all ui-icon-refresh" onclick='getNotas();' ></a>
    </div><!-- /header -->
    <div data-role="content" >
        <form action="" method="post" id="form" name="form" >

            <ul data-role="listview" data-filter="true" data-theme="a"  class="lista-radio"  data-inset="false" id="listaNotasRadio">
                
                
           



            </ul>


        </form>
        <script>
            $(document).on("pagebeforecreate",function() {
                getNotas();
            });
          
    function getNotas() {

                $.mobile.loading("show");     
                $("#listaNotasRadio").html("");
//                $('#listaNotasPrensa').listview('refresh');
                $.ajax({
                    cache: false,
                    type: 'POST',
                    url: 'controlNotas.php',
                    dataType: 'json',
                    data: {
                        accion: "getNotasRadio"

                    },
                    success: function(json) {
                        if (json === "error") {
                            alert("errorEnResultado");
                        } else {
//                    alert("ok");
                            var Notas = json.notas;
                            var html="";
                         
                            if (Notas == "") {
                            } else {

                                html = '<li data-role="list-divider" data-theme="a">&nbsp;<span data-theme="" class="ui-li-count">'+Notas.length+'</span></li>';
                                for (var i = 0; i < Notas.length; i++) {
                                    html += '<li id="' + Notas[i]['id'] + '" data-theme="b" class="lista-radio">';
                                    html += '<a href = "NotaRadio.php?id=' + Notas[i]['id'] + '" >';
        html += '<p class="ui-li-aside"><strong>'+Notas[i]['Medio']+'</strong><br>'+Notas[i]['Noticiero']+'</p>';                            
        html += '<h3>' + Notas[i]['Nombre'] + '</h3>';

                                    html += '<p> <br >' + cutStringNotHalfWords(Notas[i]['Contenido'], 250, ' ', ' ...')+'</p>';
                                    
                                    
                                    html += '</a>';
                                    html += '</li>';

                                }
                            }
                          
                            $("#listaNotasRadio").html(html);
                            $('#listaNotasRadio').listview('refresh');
                        }
                    },
                    error: function(resultado) {
                        alert("resultadoerror=" + resultado);
                    },
                                                        beforeSend: function() {

                                                            $.mobile.loading("show");     
                                                        },
                                                        complete: function() {
                                                            $.mobile.loading("hide");     
                                                        },
                });
            }
        </script>
    </div><!-- /content -->

    <?php include_once('footer.php'); ?>