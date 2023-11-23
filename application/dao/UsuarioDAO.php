// UsuarioDAO.php
require_once 'Conexao.php';
require_once 'UsuarioModel.php';

namespace Application\dao;

use Application\models\;

class UsuarioDAO {
    public function cadastrarUsuario(UsuarioModel $usuario) {
        $conexao = Conexao::obterConexao();
        $query = "INSERT INTO usuarios (nome_usuario, senha, email) VALUES (:nome_usuario, :senha, :email)";

        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':nome_usuario', $usuario->getNomeUsuario());
        $stmt->bindParam(':senha', $usuario->getSenha());
        $stmt->bindParam(':email', $usuario->getEmail());

        return $stmt->execute();
    }

    public function obterUsuarioPorNomeUsuario($nomeUsuario) {
        $conexao = Conexao::obterConexao();
        $query = "SELECT * FROM usuarios WHERE nome_usuario = :nome_usuario";

        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':nome_usuario', $nomeUsuario);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
