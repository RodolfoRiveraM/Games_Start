<?php
session_start();

require_once '../../config/db.php';
require_once '../../config/parameters.php';
require_once '../../helpers/utils.php';
?>

<!--
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="http://localhost/Proyecto/Tiendita/assets/css/styles.css" />
    </head>
    <body>
    <div id="container2">
  <header id="header2">
<div id="logo2">
                   
                  
                </div>
      
  </header>
    </div>
    </body>
</html>
-->

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css" />
        <link href="<?= base_url ?>assets/css1/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url ?>assets/css1/estilos.css" rel="stylesheet">
        <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
  />
   
    </head>
    <body>
        <script src="<?= base_url ?>assets/js/jquery-3.5.1.min.js"></script>
        <script src="<?= base_url ?>assets/js/bootstrap.min.js"></script>
        <div id="container2">
            <!-- CABECERA -->
            <header id="header2">
                <div id="logo2">
                    <a href="<?= base_url ?>">
                    <img class="animated bounceInLeft" src="<?= base_url ?>assets/img/logo.png" alt="hola" />
                    </a>
                </div>
            </header>
            <div id="content"> 
                
                <aside id="lateral">
                   
                    <?php if (!isset($_SESSION['identity'])): ?>
                        <h3>Entrar con tu usuario</h3>
                        
                    <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'Identificación fallida !!'): ?>
                        <strong class="alert_red">Registro fallido, introduce bien tu usuario</strong>
                    <?php endif; ?>
                        <?php Utils::deleteSession('error_login'); ?>
                        <form action="<?= base_url ?>usuario/login" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email" />
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" />
                            <input type="submit" value="Enviar" />
                        </form>
                    <?php else: ?>
                        <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
                    <?php endif; ?>



                </aside>


                <div id="central2">
                    <h1>Registrarse</h1>

                    <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

                    <form action="<?= base_url ?>usuario/save" method="POST">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required/>

                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" required/>

                        <label for="email">Email</label>
                        <input type="email" name="email" required/>

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" required/>

                        <input type="submit" value="Registrarse" />
                    </form>
                </div>


            </div>



            <!-- PIE DE PÁGINA -->
            <footer id="footer">
                <p>Desarrollado por Rodolfo Rivera Monjaras WEB &copy; <?= date('Y') ?></p>
            </footer>
        </div>
    </body>
</html>
