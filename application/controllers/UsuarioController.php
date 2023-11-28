<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;


class UsuarioController extends Controller{
	public function index(){
		$this->view('usuario/index');
	}
	
	// Essa função redireciona para o arquivo php em usuario/cadastro.php
	public function cadastrar(){
		$this->view('usuario/cadastrar');
	}   	
	
	public function cadastrarUsuario(){
		$nomeUsuario = $_POST['nomeUsuario'];
		$senha = $_POST['senha'];
		$senhaRepetir = $_POST['senhaRepetir'];		
		$email = $_POST['email'];

		// Depois das variáveis serem passadas corretamente, as mesmas são assimiladas pelo construtor da classe que assimila elas globalmente no php, que depois joga elas para o MySQL
		$usuario = new Usuario($nomeUsuario, $senha, $email);

		// Sendo jogado para o MySQL a partir daqui
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->cadastrarUsuario($usuario);
		
		$this->view('usuario/cadastrar', ["msg-cadastrado" => "Sucesso"]);

	}
}
?>