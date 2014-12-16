<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Controller/Produto.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Controller/Usuario.php');
	class Sistema{
		public function Sistema(){
			
		}
	
		public function SistemaAll(){
			require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/View/Viewpage.php');
			@$mostrar=$_GET['mostrar'];
			if(!$mostrar || $mostrar=='usuario'){
				$usuario= new Controle_usuario();
				return $usuario->requisicaoUsuario();
			}elseif($mostrar=='produto'){
				$produto =new Controler_Produto();
				return $produto->RequisicaoProduto();
			}
			
		}
		
	}
?>