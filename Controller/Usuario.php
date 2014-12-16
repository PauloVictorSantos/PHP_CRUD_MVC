<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Model/Usuario.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/DAO/UsuarioDAO.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/DAO/Conexao.php');
    class Controle_usuario{
    	public function Controle_usuario(){
    		
    	}
		public function redireciona($local){
			 header('Location: '.$local);
		}
		
		
		public function SalvarUsuario(){ 
			
				$usuarioDAO= new UsuarioDao();
				$usuario= new Model_usuario();
				
				if (isset($_POST['submit'])):
				$p=$_POST;
				$usuario->setNome($p['nome']);
				$usuario->setEmail($p['email']);
				$usuario->setSenha($p['senha']);
				$usuario->setData(implode("-",array_reverse(explode("/",$p['data']))));
				
					$usuarioDAO->inserir($usuario->getNome(),$usuario->getEmail(),$usuario->getSenha(),$usuario->getData());
					$this->redireciona('index.php?mostrar=usuario');
				
				endif;
			
			include 'View/Usuario.php';
			
		}
		public function IdUsuario(){ 
			
			$usuarioDAO= new UsuarioDao();
			$usuario= new Model_usuario();
			@$id=$_GET['idu'];		
			$usuario->setId($id);
			
			
			
			if (isset($_POST['submit'])){
					
				$p=$_POST;
				@$usuario->setNome($p['nome']);
				@$usuario->setEmail($p['email']);
				@$usuario->setSenha($p['senha']);
				@$usuario->setData(implode("-",array_reverse(explode("/",$p['data']))));
				
					$usuarios=$usuarioDAO->listarId($usuario->getId());
					$usuarioDAO->editar($usuario->getId(), $usuario->getNome(), $usuario->getEmail(), $usuario->getSenha(), $usuario->getData());			
					$usuarios=$usuarioDAO->listarId($usuario->getId());
					$this->redireciona('index.php?mostrar=usuario');				
			}else{
				$usuarios=$usuarioDAO->listarId($usuario->getId());
			}
			
			include 'View/EditarUsuario.php';
		}
		
		
		public function TodosUsuario(){
			require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/View/ListaUsuario.php');	
			$usuarioDAO= New UsuarioDao();
			$usuarios=$usuarioDAO->listar();
			return $usuarios;
		}
		
		public function ExcluirUsuario(){
			
				
			$usuarioDAO= new UsuarioDao();
			
				@$id=$_GET['idu'];

				$usuario= new Model_usuario();
				$usuario->setId($id);
				$usuarioDAO->deletar($usuario->getId());
				$this->redireciona('index.php?mostrar=usuario');
		
		}

		public function requisicaoUsuario(){
			@$op=$_GET['opcao'];
			
			if($op=='novo'){
				$this->SalvarUsuario();
			}
			elseif(!$op ||$op=='listar'){
				$this->TodosUsuario();
				
			}elseif($op=='excluir'){
				$this->ExcluirUsuario();
			}elseif($op=='editar'){
				$this->IdUsuario();
			}
			else{
				echo "Erro!";
			}
		}
	
    }
?>