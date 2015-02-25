<!DOCTYPE html> 
<?php
@session_start();
?>
<?php include_once('header.php'); ?>
    <div data-role="page" id="Login" data-title="Login" data-theme="a">
        <script type="text/javascript">
             $(document).one("pagebeforecreate", function() {
                if (localStorage.getItem('statusMonitoreo') == 'logueado') {
//                    alert("localstorage monitoreo");
                    $('#username').val(localStorage.getItem('usernameMonitoreo'));
                    $('#password').val(localStorage.getItem('passwordMonitoreo'));

                    localStorage.removeItem('status');
                    localStorage.removeItem('user');
                    localStorage.removeItem('username');
                    localStorage.removeItem('password');
                    localStorage.removeItem('nivel');

                    $('#formIndex').submit();
                } else if (localStorage.getItem('status') == 'logueado') {
//                         alert("localstorage anterior");
                    $('#username').val(localStorage.getItem('username'));
                    $('#password').val(localStorage.getItem('password'));
                    $('#formIndex').submit();
                }else{
//                    alert("nada en localstorage");
                }
            });
        </script>  
        <div data-role="header" class="ui-header-fixed">
            <h1>Monitoreo</h1>
           
        </div>
        <div data-role="content"><br><br>
            
            <form action="login.php" method="post" align="center" id="formIndex" name="formIndex">
                <div class="ui-field-contain field-no-border">
                    <label for="username">Usuario:</label>
                    <input type="text" name="username" id="username" placeholder="Nombre de usuario" autofocus required />
                </div>

                <div class="ui-field-contain field-no-border">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="" placeholder="Introduzca su contraseña" required />
                </div>
                <center><img align="center" src="images/escudo.png" style="max-width: 70%"></center>
                <input type="submit" id="boton" name="boton" value="Entrar">
            </form>

        </div>
        <div data-role="footer" class="ui-footer-fixed" >
            <h5>Gobierno del Estado de Morelos</h5>
        </div>


    </div>
</body>




</html>