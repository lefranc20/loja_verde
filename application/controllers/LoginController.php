<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;

class LoginController {
    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function index() {
        // Exibe o formulário de index.php do login. Redireciona para ele.
        include 'login/index.php';
    }

    public function processaLogin() {
        // Manipula o login pela submissão do formulário no index.html
        $nomeUsuario = $_POST['nomeUsuario'];
        $senha = $_POST['senha'];

        $usuarioDAO = $this->usuarioDAO->getNomeUsuario($nomeUsuario);

        // Checa se o usuário existe e a senha está correta
        if ($usuario && password_verify($password, $usuario->getSenha())) {
            // Login válido, define a variável de sessão
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
        } else {
            // // Login inválido, exibe uma mensagem de erro
            echo "Nome de usuário ou Senha inválidas";
        }
    }

    public function cadastro() {
        // Exibe o formulário de cadastro
        include 'login/cadastro.php';
    }

    public function processaCadastro() {
        // Manipula o cadastro pela submissão do formulário no cadastro.html
        $nomeUsuario = $_POST['nomeUsuario'];
        $senha = $_POST['senha'];
		
        // Performa uma validação e lógica de registro

        // Cria uma hash criptografica da senha antes de salvá-la para a base de dados. O método password_hash é interno ao php
        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

        // Cria um novo usuário no banco de dados
        $this->usuarioDAO->cadastrarUsuario($nomeUsuario, $hashSenha);

        // Redireciona para a página inicial após o cadastro com sucesso
        header('Location: index.php?action=login');
    }

    public function logout() {
        // Desconecta o usuário destruindo a sessão
        session_destroy();
        header('Location: index.php');
    }
}

?>
