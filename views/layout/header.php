<?php phpinfo(); ?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Games Start</title>
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
        <div id="container">
            <!-- CABECERA -->
            <header id="header">
                <div id="logo">
                    <a href="<?= base_url ?>">
                    <img  src="<?= base_url ?>assets/img/logo.png" alt="hola" />
                    <img class="animated  rubberBand" src="<?= base_url ?>assets/img/logo3.png" alt="hola" />
                    
                    </a>
                </div>

                <div id="busqueda">
                    <nav class="navbar navbar-light bg-light">
                        
                        <form action="<?=base_url?>producto/buscar" method="POST" class="form-inline">
                            <input class="form-control mr-sm-2" type="text" placeholder="Buscar producto" aria-label="Search" name="busqueda">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Buscar">Buscar</button>
                        </form>
                        
                    </nav>
                </div>
                <div id="busqueda1">
                    <!-- Contextual button for informational alert messages -->
                    <?php if(isset($_SESSION['admin'])): ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gestionar <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url?>categoria/index">Categoria</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=base_url?>producto/gestion">Producto</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=base_url?>pedido/gestion">Pedido</a></li>

                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['identity'])): ?>
                    <!-- Indicates caution should be taken with this action -->
                    
                    
                    <a href="<?=base_url?>pedido/mis_pedidos"><button type="button" class="btn btn-primary">Mis pedidos</button></a>
                    <!-- Indicates a dangerous or potentially negative action -->
                    <a href="<?=base_url?>usuario/logout"><button type="button" class="btn btn-primary">Cerrar sesión</button></a>
                    <?php endif; ?> 
                    
                    <?php if(!isset($_SESSION['identity'])): ?>
                    
                    <a href="http://localhost/Proyecto/Tiendita/views/usuario/create">
                    <button type="button" class="btn btn-primary" class="algo"  >
                        <span class="glyphicon glyphicon-user" aria-hidden="true" ></span> Crear cuenta/ Ingresar
                    </button>
                    </a>
		<?php else: ?>
			
		<?php endif; ?>



                </div>
                
                
            </header>

            <!-- MENU -->
            <?php $categorias = Utils::showCategorias(); ?>

            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?= base_url ?>">Inicio</a>
                    </li>
                    <?php while ($cat = $categorias->fetch_object()): ?>
                        <li>
                            <a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a>
                        </li>

                    <?php endwhile; ?>
                
                    <div id="sepa">
                        <?php $stats = Utils::statsCarrito(); ?>
                        <a href="<?=base_url?>carrito/index">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <button type="button" class="btn btn-default btn-lg"  >
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Mis compras(<?=$stats['count']?>)
                                
                             
                            </button>
                        </ul>
                    </a>
                    </div>


                </ul>

            </nav>




            <div id="content">   



<div id="central">
<?php    echo $phpVariable; ?>