<?php
@session_start();
if ((!isset($_SESSION['loggedMonitoreo'])) || ($_SESSION['loggedMonitoreo'] == false) || ($_SESSION['loggedMonitoreo'] == "")) {
    @header("Location: index.php");
}
?>
<!DOCTYPE HTML>
<?php include_once('header.php'); ?>

<div data-role="page" id="Home" name="Home" data-title="Monitoreo de medios" data-theme="a">
    <div data-role="header" data-position="fixed" data-theme="c" >
        <h1>Bienvenido</h1>


        <a id="close" name="close" class="ui-btn ui-btn-right ui-btn-icon-notext ui-btn-corner-all ui-icon-power" ></a>
        <script>

            $('#Home').bind("pageinit", function() {
                localStorage.setItem('statusMonitoreo', '<?php echo $_SESSION['statusMonitoreo']; ?>');
                localStorage.setItem('userMonitoreo', '<?php echo $_SESSION['userMonitoreo']; ?>');
                localStorage.setItem('usernameMonitoreo', '<?php echo $_SESSION['usernameMonitoreo']; ?>');
                localStorage.setItem('passwordMonitoreo', '<?php echo $_SESSION['passwordMonitoreo']; ?>');
                localStorage.setItem('nivelMonitoreo', '<?php echo $_SESSION['nivelMonitoreo']; ?>');
            });
            $('#close').click(function() {
//                alert("close");
                localStorage.removeItem('status');
                localStorage.removeItem('user');
                localStorage.removeItem('username');
                localStorage.removeItem('password');
                localStorage.removeItem('nivel');
                localStorage.removeItem('statusMonitoreo');
                localStorage.removeItem('userMonitoreo');
                localStorage.removeItem('usernameMonitoreo');
                localStorage.removeItem('passwordMonitoreo');
                localStorage.removeItem('nivelMonitoreo');

                $("#formHome").submit();
            });
        </script>
    </div>
    <div data-role="content" align="center">
        <form action="close.php" method="post" id="formHome" name="formHome">
            <br><br><br>
            <center><img align="center" src="images/escudo.png" class="imagen-grande"></center>
        </form>
    </div>

    <?php include_once('footer.php'); ?>