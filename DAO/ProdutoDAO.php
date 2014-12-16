<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/PHP_sist/DAO/Conexao.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/PHP_sist/Model/Produto.php");
   class ProdutoDao{
   	public function ProdutoDAO(){
   		
   	}
	
	public function inserir($nome,$quantidade,$valor){
		echo $sql="INSERT INTO `produto`(`id`, `Nome`, `Quantidade`,`Valor`) VALUES
		 ('','".$nome."','".$quantidade."','".$valor."')";
		
		$conexao= new Conexao();
		
		$conexao->conecta();
		
		$conexao->AtualQuery($sql);
		
		$conexao->desconecta(); 
	}
	public function listar(){
		$sql="SELECT `id`, `Nome`, `Quantidade`, `Valor`, Round((`Quantidade`*`Valor`),2) as Resultado FROM `produto`";
		
		$conexao = new Conexao();
		$conexao->conecta();
		$rs=$conexao->execQuery($sql);
		$Arproduto = Array();
		
		$indice=0;
		 while ($row = mysql_fetch_array($rs)) {
			$produto = new Model_Produto();
			$produto->setId($row['id']);
			$produto->setNome($row['Nome']);
			$produto->setQtd($row['Quantidade']);
			$produto->setValor($row['Valor']);
			$produto->setResultado($row['Resultado']);
			$Arproduto[$indice]=$produto;	
			$indice++;
		}

		$conexao->desconecta();
		return $Arproduto;
		
	}
	public function TotalProduto($nome){
		$sql="SELECT SUM(`Quantidade`) as Quant FROM `produto`";
		if($nome!=NULL){
			$sql.=" WHERE `Nome` like '%".$nome."%'";
		}
		$conexao= new Conexao();
		$conexao->conecta();
		$rs=$conexao->execQuery($sql);
		$indice=0;
			while($row = mysql_fetch_array($rs)){
				$indice=$row['Quant'];
			}
			if($indice==0){
				echo "0";
			}
			echo $indice;
		
			$conexao->desconecta();
	}
	public function pesquisa($nome){
		$sql= "SELECT `id`, `Nome`, `Quantidade`, `Valor`,Round((`Quantidade`*`Valor`),2) as Resultado  FROM `produto` WHERE `Nome` like '%".$nome."%'";
		$conexao= new Conexao();
		$conexao->conecta();
		$rs=$conexao->execQuery($sql);
		$arproduto= Array();
		
		$indice=0;
		while($row = mysql_fetch_array($rs)){
			$produto = new Model_Produto();
			$produto->setId($row['id']);
			$produto->setNome($row['Nome']);
			$produto->setQtd($row['Quantidade']);
			$produto->setValor(str_replace('.' ,',',$row['Valor']));
			$produto->setResultado($row['Resultado']);
			$arproduto[$indice]=$produto;
			$indice++;
		}
		
		$conexao->desconecta();
		return $arproduto;
		
	}
	public function deletar($id){
		$sql="DELETE FROM `produto` WHERE `id`='".$id."'";
		
		$conexao = new Conexao();
		$conexao->conecta();
		$conexao->execQuery($sql);
		$conexao->AtualQuery($sql);
		$conexao->desconecta();
		
	}
	
	public function listaId($id){
		$sql = "SELECT `id`, `Nome`, `Quantidade`, `Valor` FROM `produto` WHERE `id`='".$id."'";
		$conexao = new Conexao();
		$conexao->conecta();
		$rs= $conexao->execQuery($sql);
		$produto= new Model_Produto();
		if($row= mysql_fetch_array($rs)){
			$produto->setId($row['id']);
			$produto->setNome($row['Nome']);
			$produto->setQtd($row['Quantidade']);
			$produto->setValor($row['Valor']);
		}
		$conexao->desconecta();
		return $produto;
	}
	
	public function editar($id,$nome,$quantidade,$valor){
		$sql="UPDATE `produto` SET `Nome`='".$nome."',`Quantidade`='".$quantidade."',`Valor`='".$valor."' WHERE `id`='".$id."'";
		
		$conexao= new Conexao();
		$conexao->conecta();
		$conexao->execQuery($sql);
		$conexao->AtualQuery($sql);
		$conexao->desconecta();
		
	}
	
   }
?>