<?php
ob_start(); 
require_once 'models/usuario.php';



class usuarioController{
	
	public function index(){
		echo "Controlador Usuarios, Acción index";
	}
	
	public function registro(){
		require_once 'views/usuario/registro.php';
	}
        
        public function contacto(){
            require_once 'views/usuario/contacto.php';
        }
        
        public function usuario(){
            require_once 'views/usuario/usuario.php';
        }
        
        public function nosotros(){
            require_once 'views/usuario/nosotros.php';
        }
	
	public function save(){
		if(isset($_POST)){
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			
			if($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);

				$save = $usuario->save();
				if($save){
					$_SESSION['register'] = "complete";
                                        $nombre = $_POST['nombre'];
                                        $apellidos = $_POST['apellidos'];
                                        $email = $_POST['email'];
                                        $password = $_POST['password']; 
                                        $msg = 'Bienvedio a nuesta tienda '. $nombre . $apellidos. ' tu contraseña es '.$password;
                                        $header = "From: gamesstart@example.com" . "\r\n";
                                        $header.= "Reply-To: gamesstart@example.com" . "\r\n";
                                        $header.= "X-Mailer: PHP/". phpversion();
                                        $mail = @mail($email,'Bienvenido a Games start',$msg,$header);
                                        
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		//header("Location:".base_url.'usuario/registro');
                echo '<script>window.location="http://localhost/Proyecto/Tiendita/views/usuario/create"</script>';
	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
                                $_SESSION['error_login'] = 'segura';
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
				
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
                                echo '<script>window.location="'.base_url.'views/usuario/create"</script>';
			}
		
		}
		//header("Location:".base_url);
                			$phpVariable = "Dog";

                echo '<script>window.location="'.base_url.'"</script>';
	}
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		//header("Location:".base_url);
                echo '<script>window.location="'.base_url.'"</script>';
                //ob_enf_fluch();
	}
	
} // fin clase