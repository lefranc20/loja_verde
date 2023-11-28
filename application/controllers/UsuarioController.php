<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;

class UsuarioController extends Controller{
	public function index(){
		$usuarioDAO = new UsuarioDAO();
		$usuarios = $usuarioDAO->findAll();
		// $produtos = $produtoDAO::findAll();
		$this->view('usuario/index', ['usuarios' => $usuarios]);
	}
	
	// Essa função redireciona para o arquivo php em usuario/cadastrar.php
	public function cadastrar(){
		$this->view('usuario/cadastrar');
	}   	
	
	// Equivalente ao salvar() do produto
	public function salvar(){
		$nomeUsuario = $_POST['nomeUsuario'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];

		// Depois das variáveis serem passadas corretamente, as mesmas são assimiladas pelo construtor da classe que assimila elas globalmente no php, que depois joga elas para o MySQL
		$usuario = new Usuario($nomeUsuario, $senha, $email);

		// Sendo jogado para o MySQL a partir daqui
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->cadastrarUsuario($usuario);
		
		$this->view('usuario/cadastrar', ["msg-cadastrado" => "Usuário cadastrado com Sucesso!"]);
	}
	
	
	public function iniciarEditar($id){
		// 1 - Buscar os dados 
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->findById($id);
		// 2 - Mostrar na view
		$this->view('usuario/editar', ["usuario" => $usuario]);
	}

	public function atualizar(){
		//RECEBE OS DADOS
		$id = filter_input(INPUT_POST, "id");
		$nomeUsuario = filter_input(INPUT_POST, "nomeUsuario");
		$senha = filter_input(INPUT_POST, "senha");
		$email = filter_input(INPUT_POST, "email");

		//CRIA O OBJETO
		$usuario = new Usuario($nomeUsuario, $senha, $email);
		$usuario->setId($id);

		//CRIA O USUARIO DAO
		$usuarioDAO = new UsuarioDAO();
		$usuarioAtualizado = $usuarioDAO->atualizar($usuario);
		
		if($usuarioAtualizado){
			$msg = "Sucesso";
		}else{
			$msg = "Erro ao editar";
		}
		
		$this->view("usuario/editar", ["msg" => $msg, "usuario" => $usuarioAtualizado]);
	}

	public function deletar(){
		$id = filter_input(INPUT_POST, "id");
		$usuarioDAO = new UsuarioDAO();
		
		if($usuarioDAO->deletar($id)){
			$msg = "Sucessoooo";
		}else{
			$msg = "Deu errooo ";
		}
		$usuarios = $usuarioDAO->findAll();
		$this->view("usuario/index", ["msg" => $msg, "usuarios" => $usuarios]);
	}
}
?>