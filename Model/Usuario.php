<?php
     class Model_usuario{
     	function Model_usuario(){
     		
     	}
		var $id;
		var $nome;
		var $email;
		var $senha;
		var $data;
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
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getData(){
			return $this->data;
		}
		public function setData($data){
			$this->data= $data;
		}
     }
?>