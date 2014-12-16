<?php
    class Conexao{
    	var $host;
		var $usuario;
		var $pass;
		var $nome_banco;
		var $saida;
		var $status;
		var $query_conexao;
		
		function Conexao(){
			
		}
		
		public function conecta(){
			$this->status=0;
			$this->host="localhost";
			$this->user="root";
			$this->pass="";
			$this->nome_banco="sistema";
			$this->query_conexao=mysql_connect($this->host,$this->user,$this->pass);
			if(!$this->nome_banco){
				echo "Erro ao conectar ao banco de dados".mysql_error();
			}else{
				$this->status=1;
			}
			mysql_select_db($this->nome_banco);
			mysql_set_charset("utf-8");
		}
		
		function desconecta() {
        	return mysql_close($this->query_conexao);
    	}
		public function execQuery($query){
			if($this->status==1){
				if($this->saida=mysql_query($query)){
					return $this->saida;
				}else{
					echo "<pre class=\"error\">";
	                echo "SQL ERROR: " . mysql_error();
	                echo "SQL : " . $query;
	                echo "</pre>";
	                $this->desconecta();
				}
			}
		}
		public function AtualQuery($query) {
        if ($this->status == 1) {
            if ($this->entrada = mysql_query($query)) {
                return true;
            } else {
                echo "<pre class=\"error\">";
                echo "SQL ERROR: " . mysql_error();
                echo "</pre>";
                $this->desconecta();
                return false;
            }
        }
		
		
    }
    }
?>