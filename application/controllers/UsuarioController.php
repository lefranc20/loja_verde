<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;


class UsuarioController extends Controller{
	public function index(){
		$this->view('usuario/index');   
	}
	
	// Essa função redireciona para o arquivo php em usuario/cadastro.php
	public function cadastro(){
		$this->view('usuario/cadastro');
	}   	
	
	public function cadastrarUsuario(){
		$i = 0;
		$x = 1;
		// variável x começa com 1, caso as duas senhas sejam iguais (cujo elas deveriam ser), isso se altera para 0, e e tudo isso sai do repetidor
		while($x == 1){
			// Como ele já entra no repetidor na primeira vez, eu não quero que ele apareça a senha já está incorretamente repetida
			if($i == 1){
				echo "Senha incorretamente repetida";
			}
			// Os parâmetros na seção 'name' do html 'cadastro.php' estão sendo passadas por POST para as variáveis correspondentes nessa função
			$nomeUsuario = $_POST['nomeUsuario'];
			$senha = $_POST['senha'];
			$senhaRepetir = $_POST['senhaRepetir'];		
			$email = $_POST['email'];
					
			if($senha == $senhaRepetir){
				$x = 0;
			}else {
				$i = 1;
			}
		}
		
		// Depois das variáveis serem passadas corretamente, as mesmas são assimiladas pelo construtor da classe que assimila elas globalmente no php, que depois joga elas para o MySQL
		$usuario = new Usuario($nomeUsuario, $senha, $email);

		// Sendo jogado para o MySQL a partir daqui
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->cadastrarUsuario($usuario);
	}
}
?>