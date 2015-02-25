<?php
@session_start();
if ((!isset($_SESSION['loggedMonitoreo'])) || ($_SESSION['loggedMonitoreo'] == false) || ($_SESSION['loggedMonitoreo'] == "")) {
    @header("Location: index.php");
}
include_once 'class/classNotas.php';
$clase = new classNotas();
$Nota = $clase->getNotaRadioTV($_GET['id']);
?>
<!DOCTYPE HTML>
<html manifest="cache.manifest">

   

<?php include_once('header.php'); ?>
        <div data-role="page" id="page" data-title="Monitoreo de medios">
            <div data-role="header" data-theme="c">
               <a href="" class="ui-btn ui-btn-left ui-btn-icon-notext ui-btn-corner-all ui-icon-back" data-direction="back" data-rel="back"></a>

                <h1>Nota de Radio</h1>
            </div><!-- /header -->
            <div data-role="content">
                <form action="" method="post" id="form"  data-theme="b">


                    <h3 align="justify"><?php echo $Nota['Nombre']; ?>
                    </h3>
                    <h4><?php echo nl2br($Nota['Noticiero']); ?> - <?php echo $Nota['Hora']; ?></h4>
                    <p align="justify"><?php echo nl2br($Nota['Contenido']);?> 

                    </p>
                    <?php if ($Nota['Media'] != "") { ?>
                        <br> <center><audio id="<?php echo "AudioNota" . $Nota['id']; ?>" preload="auto" controls="controls" src="http://monitoreo.morelos.gob.mx/admin/_lib/file/docarchivos_radio/<?php echo $Nota['Media']; ?>"></audio></center>
                    <?php } ?>
                    <?php ?>
                </form>
            </div><!-- /content -->
            <?php include_once('footer.php'); ?>
