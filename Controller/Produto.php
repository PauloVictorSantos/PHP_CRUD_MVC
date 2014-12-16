<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Model/Produto.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/DAO/ProdutoDAO.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/DAO/Conexao.php');
    class Controler_Produto{
    	public function Controle_Produto(){
    		
    	}
    	public function redireciona($local){
			 header('Location: '.$local);
		}
		public function SalvarProduto(){ 
			
				$produtoDAO= new ProdutoDao();
				$produto= new Model_Produto();
				if (isset($_POST['submit'])):
				$p=$_POST;	
				$produto->setNome($p['nome']);
				$produto->setQtd($p['quantidade']);
				$produto->setValor(str_replace(',','.',$p['valor']));
			
					$produtoDAO->inserir($produto->getNome(), $produto->getQtd(), $produto->getValor());
					$this->redireciona('index.php?mostrar=produto');
				
				endif;
			
			include 'View/Produto.php';
		}
		
		public function TodosProdutos(){
			require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/View/ListaProduto.php');	
			$produtoDAO= New ProdutoDao();
			$produtos=$produtoDAO->listar();
			return $produtos;
		}
		
		public function condicional(){
			if(@$_POST['busca']==''){
				$produtos=$this->TodosProdutos();
			}else{
				$produtos=$this->Busca();
			}
		}
		
		public function QuanTotal(){
				$produtoDAO= new ProdutoDao();
				$produtos=$produtoDAO->TotalProduto(@$_POST['busca']);
				return $produtos;
			
		}
		
		public function Busca(){
			$produtoDAO= new ProdutoDao();
			$produto = new Model_Produto();
			require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/View/ResultadoProduto.php');
				$p=$_POST;
				
				if(@$p['busca']!='' || isset($p['button'])){
					@$produto->setBusca(trim($p['busca']));
					$produtos=$produtoDAO->pesquisa($produto->getBusca());
				
					return $produtos;
				}
		}
		
		public function ExcluirProduto(){
			$produtoDAO=new ProdutoDao();
			
			@$id=$_GET['idp'];
			$produto = new Model_Produto();
			$produto->setId($id);
			$produtoDAO->deletar($produto->getId());
			$this->redireciona('index.php?mostrar=produto');	
		}
		
		public function IdProduto(){
			$produtoDAO= new ProdutoDao();
			
			@$id=$_GET['idp'];
			$produto = new Model_Produto();
			$produto->setId($id);
			if(isset($_POST['submit'])){
				$p=$_POST;	
				$produto->setNome($p['nome']);
				$produto->setQtd($p['quantidade']);
				$produto->setValor(str_replace(',','.',$p['valor']));
				$produtoDAO->editar($produto->getId(), $produto->getNome(), $produto->getQtd(), $produto->getValor());
				$this->redireciona('index.php?mostrar=produto');
			}else{
				$produtos=$produtoDAO->listaId($produto->getId());
			}
			
			include'View/EditarProduto.php';
		}
		
		public function RequisicaoProduto(){
			@$op=$_GET['opcaop'];
			
			if(!$op || $op=='listar'){
				$this->condicional();
			}elseif($op=='novo'){
				$this->SalvarProduto();
			}elseif($op=='excluir'){
				$this->ExcluirProduto();
			}elseif($op=='editar'){
				$this->IdProduto();
			}else{
				echo "Erro";
			}
		}
		
    }
?>