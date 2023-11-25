<?php 
namespace Application\models;
// Model para Usuário
class Usuario {
    private $id;
    private $nomeUsuario;
    private $senha;
    private $email;

    public function __construct($nomeUsuario, $senha, $email) {
        $this->nomeUsuario = $nomeUsuario;
        $this->senha = $senha;
        $this->email = $email;
    }
	
    public function setId($id) {
        $this->id = id;
    }
    public function getId() {
        return $this->id;
    }
    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }	
    public function getSenha() {
        return $this->senha;
    }
    public function getEmail() {
        return $this->email;
    }
}
