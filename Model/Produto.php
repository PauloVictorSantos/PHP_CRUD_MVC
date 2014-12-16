<?php
    class Model_Produto{
    	public function Model_Produto(){
    		
    	}
		var $id;
		var $nome;
		var $qtd;
		var $valor;
		var $resultado;
		var $busca;
		var $quanTotal;
		public function getId(){
			return $this->id;
		} 
		public function setId($id){
			$this->id=$id;	
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function getQtd(){
			return $this->qtd;
		}    
		public function setQtd($qtd){
			$this->qtd=$qtd;
		}
		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor=$valor;
		}
		public function getResultado(){
			return $this->resultado;
		}
		public function setResultado($resultado){
			$this->resultado=$resultado;
		}
		public function setBusca($busca){
			$this->busca=$busca;
		}
		public function getBusca(){
			return $this->busca;
		}
		public function setQuantTotal($quanTotal){
			$this->quanTotal=$quanTotal;
		}
		public function getQuantTotal(){
			return $this->quanTotal;
		}
	}
?>