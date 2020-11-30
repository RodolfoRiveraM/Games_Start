<?php
ob_start();
require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
	
	public function index(){
		Utils::isAdmin();
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) ){
			// Guardar la categoria en bd
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			
                        if($nombre){
                            $categoria = new Categoria();
                            $categoria->setNombre($nombre);
                            
                        if(isset($_GET['id'])){
					$id = $_GET['id'];
					$categoria->setId($id);
					
					$save = $categoria->edit();
				}else{
					$save = $categoria->save();
				}
				
				if($save){
					$_SESSION['categoria'] = "complete";
				}else{
					$_SESSION['categoria'] = "failed";
				}
			}else{
				$_SESSION['categoria'] = "failed";
			}
		}else{
			$_SESSION['categoria'] = "failed";
		}
                
                echo '<script>window.location="'.base_url.'categoria/index"</script>';
	}
        
        public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$categoria = new Categoria();
			$categoria->setId($id);
			
			$delete = $categoria->delete();
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
                echo '<script>window.location="'.base_url.'categoria/index"</script>';
	}
	
        
        public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$categoria = new Categoria();
			$categoria->setId($id);
			
			$cat = $categoria->getOne();
			
			require_once 'views/categoria/crear.php';
			
		}else{
			//header('Location:'.base_url.'producto/gestion');
                    echo '<script>window.location="'.base_url.'categoria/gestion"</script>';
		}
	}
}