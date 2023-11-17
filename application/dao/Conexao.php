<?php 
namespace Application\dao;
class Conexao{
	private $dbName = "loja";
	private $usuario = "root";
	private $senha = "leonardo12";
	private $host = "localhost";

	// carrega e armazena a conexão realizada com banco
	private $conn;
	public function __construct(){
		// cria a conexão
		$this->conn = new \mysqli($this->host, $this->usuario, $this->senha, $this->dbName)        
    }
	
    public function getConexao(){
		// checa a conexão
		if($this->conn->connect_error){
			die("A conexão falhou. ". $this->conn->connect_error);
		}
        return $this->conn;
    }
	
    public function desconectar(){
        $this->conn->close();
    }
}

?>
