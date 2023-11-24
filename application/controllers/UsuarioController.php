<?php

use Application\core\Controller;

class UsuarioController extends Controller{
	
	
	public function index(){
		$this->view('usuario/index');   
	}
	public function cadastro(){
		$this->view('usuario/cadastro');   
		
		$nome = $_POST['nome_produto'];
		$marca = $_POST['marca'];
		$preco = $_POST['preco'];
	}   	
}
?>