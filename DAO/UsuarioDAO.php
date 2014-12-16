<?php
 	require_once($_SERVER['DOCUMENT_ROOT']."/PHP_sist/DAO/Conexao.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/PHP_sist/Model/Usuario.php");
class UsuarioDao{
	public function UsuarioDao(){
		
	}
	
	
	public function inserir($nome, $email,$senha,$data){
		$sql="INSERT INTO `usuario`(`id`, `Nome`, `Email`,`Senha`,`Data`) VALUES
		 ('','".$nome."','".$email."','".$senha."','".$data."')";
		
		$conexao= new Conexao();
		
		$conexao->conecta();
		
		$rs = $conexao->AtualQuery($sql);
		
		$conexao->desconecta(); 
	}
	
	public function listar(){
		$sql="SELECT `id`, `Nome`, `Email`, `Senha`, `Data` FROM `usuario`";
		
		$conexao = new Conexao();
		$conexao->conecta();
		$rs=$conexao->execQuery($sql);
		$Arusuario = Array();
		
		$indice=0;
		 while ($row = mysql_fetch_array($rs)) {
			$usuario = new Model_usuario();
			$usuario->setId($row['id']);
			$usuario->setNome($row['Nome']);
			$usuario->setEmail($row['Email']);
			$usuario->setSenha($row['Senha']);
			$usuario->setData($row['Data']);
			$Arusuario[$indice]=$usuario;	
			$indice++;
		}
		$conexao->desconecta();
		return $Arusuario; 
	}
	public function listarId($id){
		$sql="SELECT `id`,`Nome`, `Email`, `Senha`, `Data` FROM `usuario` WHERE id='".$id."'";
		
		$conexao = new Conexao();
		$conexao->conecta();
		$usuario= new Model_usuario();
		$rs=$conexao->execQuery($sql);
		
		if($row = mysql_fetch_array($rs)){
			$usuario->setId($row['id']);
			$usuario->setNome($row['Nome']);
			$usuario->setEmail($row['Email']);
			$usuario->setSenha($row['Senha']);
			$usuario->setData(implode("/",array_reverse(explode("-",$row['Data']))));
		}
		$conexao->desconecta();
		return $usuario;
	}
	
	public function editar($id, $nome, $email,$senha,$data){
		echo $sql="UPDATE `usuario` SET `Nome`='".$nome."',`Email`='".$email."',`Senha`='".$senha."',`Data`='".$data."' WHERE id='".$id."'";
		
		$conexao= new Conexao();
		$conexao->conecta();
		$conexao->AtualQuery($sql);
		$conexao->desconecta();
	}
	
	public function deletar($id){
		$sql="DELETE FROM `usuario` WHERE id='".$id."'";
		$conexao= new Conexao();
		$conexao->conecta();
	 	$conexao->execQuery($sql);
		$conexao->AtualQuery($sql);
		$conexao->desconecta();
	}
	
}
	
?>