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
	
	// Equivalente ao salvar() do produto
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
		$codigo = filter_input(INPUT_POST, "codigo");
		$nome = filter_input(INPUT_POST, "nome");
		$marca = filter_input(INPUT_POST, "marca");
		$preco = filter_input(INPUT_POST, "preco");

		//CRIA O OBJETO
		$produto = new Produto($nome, $marca, $preco);
		$produto->setCodigo($codigo);

		//CRIA O PRODUTO DAO
		$produtoDAO = new ProdutoDAO();
		$produtoAtualizado = $produtoDAO->atualizar($produto);
		
		if($produtoAtualizado){
			$msg = "Sucesso";
		}else{
			$msg = "Erro ao editar";
		}
		
		$this->view("produto/editar", ["msg" => $msg, "produto" => $produtoAtualizado]);
	}

	public function deletar(){
		$codigo = filter_input(INPUT_POST, "codigo");
		$produtoDAO = new ProdutoDAO();
		
		if($produtoDAO->deletar($codigo)){
			$msg = "Sucessoooo";
		}else{
			$msg = "Deu errooo ";
		}
		$produtos = $produtoDAO->findAll();
		$this->view("produto/index", ["msg" => $msg, "produtos" => $produtos]);
	}
}
?>