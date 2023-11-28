<?php
namespace Application\dao;

use Application\models\Usuario;

class UsuarioDAO {
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

}
?>