<?php include_once('header.php'); ?>
        <div data-role="page" id="Error" data-title="Monitoreo de medios">
            
                <div data-role="header" data-theme="e">
                    <h1>Error de Login</h1>
                </div>
                <div data-role="content" data-theme="e">
                    <h1>Usuario <?php echo $_GET['username'];?> inválido</h1>
                    <p>Por favor verifique su usuario y contraseña</p>
                    <a id="botonIndex" href="index.php" data-role="button" data-theme="c">Aceptar</a>       
                </div>
                <div data-role="footer" class="nav-icons" data-theme="c" data-position="fixed">
                </div>
     
        </div>
    </body>
     <script>

           
            $('#botonIndex').click(function() {
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

            });
        </script>
    
</html>
