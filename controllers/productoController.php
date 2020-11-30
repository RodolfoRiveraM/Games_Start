<?php
ob_start();
require_once 'models/producto.php';

class productoController{
	
	public function index(){
            
                            // Conseguir categoria
			$categoria = new Categoria();
			$categorias = $categoria->getRandom(3);
                        
		$producto = new Producto();
		$productos = $producto->getRandom(5);
                
                
                $producto2 = new Producto();
	        $productos2 = $producto2->getAll();
                
                $producto3 = new Producto();
	        $productos3 = $producto3->getAll();
                
                $producto4 = new Producto();
	        $productos4 = $producto4->getAll();
	
		// renderizar vista
		require_once 'views/producto/destacados.php';
	}
        
        public function buscar(){
            
            require_once 'views/producto/buscar.php';
        }
        
       
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$producto = new Producto();
			$producto->setId($id);
                        
                        
			
			$product = $producto->getOne();
			
		}
		require_once 'views/producto/ver.php';
	}
	
	public function gestion(){
		Utils::isAdmin();
		
		$producto = new Producto();
		$productos = $producto->getAll();
		
		require_once 'views/producto/gestion.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/producto/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			$genero = isset($_POST['genero']) ? $_POST['genero'] : false;
                        $publisher = isset($_POST['publisher']) ? $_POST['publisher'] : false;
                        $jugadores = isset($_POST['jugadores']) ? $_POST['jugadores'] : false;
                        
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $descripcion && $precio && $stock && $categoria && $genero && $publisher && $jugadores && $fecha){
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				$producto->setCategoria_id($categoria);
                                $producto->setGenero($genero);
                                $producto->setPublisher($publisher);
                                $producto->setJugadores($jugadores);
                                $producto->setFecha($fecha);
                                
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					
					$save = $producto->edit();
				}else{
					$save = $producto->save();
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		//header('Location:'.base_url.'producto/gestion');
                echo '<script>window.location="'.base_url.'producto/gestion"</script>';
	}
	
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Producto();
			$producto->setId($id);
			
			$pro = $producto->getOne();
			
			require_once 'views/producto/crear.php';
			
		}else{
			//header('Location:'.base_url.'producto/gestion');
                    echo '<script>window.location="'.base_url.'producto/gestion"</script>';
		}
	}
	
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		//header('Location:'.base_url.'producto/gestion');
                //echo '<script>window.location="'.base_url."producto/gestion";'</script>';
               // echo '<script>window.location="'.base_urlproducto/gestion'"</script>';
                echo '<script>window.location="'.base_url.'producto/gestion"</script>';
	}
	
}