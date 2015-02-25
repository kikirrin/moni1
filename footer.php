<?php

echo '
    <div data-role="footer" class="nav-icons" data-theme="a" data-position="fixed">
                <div data-role="navbar" class="nav-icons"'; 
if ($_SESSION['nivelMonitoreo'] == "1" || $_SESSION['nivelMonitoreo'] == "2" || $_SESSION['nivelMonitoreo'] == "7") { 
echo 'data-grid="d"';
   } else { 
echo 'data-grid="b"';
    } 
echo '>
                    <ul>';

                    //if($_SERVER['REQUEST_URI']=='/estadisticas/graficasCategorias.php'){echo '<li class="active">';}else{ echo '<li>';} echo'<a href="graficasCategorias.php">• De Categorías</a></li>';
$ruta = explode("/", $_SERVER['REQUEST_URI']); 
$ubicacion=$ruta[count($ruta)-1];

                       echo'<li><a href="listaPrensa.php" class="'; if($ubicacion=='listaPrensa.php'){echo 'ui-btn-active';} echo ' ui-icon-prensa ui-btn-icon-top">Prensa </a></li>';
                       echo'<li><a href="listaRadio.php"  class="'; if($ubicacion=='listaRadio.php'){echo 'ui-btn-active';} echo ' ui-icon-radio ui-btn-icon-top">Radio</a></li>';
                      echo'<li><a href="listaTV.php"  class="'; if($ubicacion=='listaTV.php'){echo 'ui-btn-active';} echo ' ui-icon-tv ui-btn-icon-top">TV</a></li>';
//                       if ($_SESSION['nivelMonitoreo'] == "1" || $_SESSION['nivelMonitoreo'] == "2" || $_SESSION['nivelMonitoreo'] == "7") { 
                           echo'<li><a href="sintesis.php"  class="'; if($ubicacion=='sintesis.php'){echo 'ui-btn-active';} echo ' ui-icon-digital ui-btn-icon-top">Síntesis</a></li>';
                            echo'<li><a href="portadas.php"  class="'; if($ubicacion=='portadas.php'){echo 'ui-btn-active';} echo ' ui-icon-portadas ui-btn-icon-top">Portadas</a></li>';
//                         } 
             echo '</ul>
                </div>
            </div>
        </div>
    </body>
</html>';
?>