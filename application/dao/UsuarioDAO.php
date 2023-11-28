<?php
namespace Application\dao;

use Application\models\Usuario;

class UsuarioDAO {
	// cadastrarUsuario() é equivalente ao salvar() do produto
    public function cadastrarUsuario($usuario) {
        $conexao = new Conexao(); // Instancia o objeto da classe do arquivo 'Conexao.php' na pasta dao
		$conn = $conexao->getConexao(); // Recebe a conexão
		
		$nomeUsuario =  $usuario->getNomeUsuario();
		$senha = $usuario->getSenha();
		$email = $usuario->getEmail();
		
		// Insere no SQL os dados das variaveis pegas no php pelo método POST. Obs: id não precisa pois é auto-incrementado
		$SQL = "INSERT INTO usuarios(id, nomeUsuario, senha, email) VALUES (null, '$nomeUsuario', '$senha', '$email')";

		if($conn->query($SQL) === TRUE){
			return true;
		}else{ 
			echo "Error: ". $SQL. "<br />".$conn->error;
			return false;
		}
    }
		
    public function findAll(){
		// 1 - Instancia
		$conexao = new Conexao();
		// 2 - Recebe 
		$conn = $conexao->getConexao();
		$SQL = "SELECT * FROM usuarios";
		$result = $conn->query($SQL);
		$usuarios = [];
		while($row = $result->fetch_assoc()){
			$usuario = new Usuario($row["nomeUsuario"], $row["senha"], $row["email"]);
			$usuario->setId($row["id"]);
			array_push($usuarios, $usuarios);
		}
		return $usuarios;
    }
	
	// Retrieve (R)
	public function findById($id){
		$conexao = new Conexao();
		$conn = $conexao->getConexao();
		$SQL = "SELECT * FROM usuarios WHERE id =".$id;
		$result = $conn->query($SQL);
		$row = $result->fetch_assoc();
		$usuario = new Usuario($row["nomeUsuario"], $row["senha"], $row["email"]);
		$usuario->setId($row["id"]);
		return $usuario;
	}

	// Update (U)
    public function atualizar($usuario){
		// Criar o conexao
		$conexao = new Conexao();
		$conn = $conexao->getConexao();
		// pega os dados
		$id = $usuario->getId();
		$nomeUsuario = $usuario->getNomeUsuario();
		$senha = $usuario->getSenha();
		$email = $usuario->getEmail();
		$SQL = "UPDATE usuarios SET nomeUsuario = '$nomeUsuario', senha = '$senha', email = '$email' WHERE id =". $id; 

		if($conn->query($SQL) === TRUE){  
			return $this->findById($id);
		}
		print_r("Error: ". $SQL. "<br />".$conn->error);
		return $usuario;
	}
	
	// Delete (D)
	public function deletar($id){
		$conexao = new Conexao();
		$conn = $conexao->getConexao();

		$SQL = "delete from produtos where id = ".$id;
		if($conn->query($SQL) === TRUE){
			return true;
		}
		return false;
	}
}
?>