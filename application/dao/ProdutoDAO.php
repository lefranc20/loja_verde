<?php

namespace Application\dao;

use Application\dao\Conexao;
use Application\models\Produto;
class ProdutoDAO{
   public static function salvar($produto){
		$conexao = new Conexao();
		$conn = $conexao->getConexao();
		$nome = $produto->getNome();
		$marca = $produto->getMarca();
		$preco = $produto->getPreco();
		$sql = "INSERT INTO produtos (codigo, nome, marca, preco) VALUES (null, '$nome', '$marca', '$preco')";
		if ($conn->query($sql) === TRUE ) {
			return true;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			return false;
		}
   }
   public static function atualizar($produto) {
		$conexao = new Conexao();
		$conn = $conexao->getConexao();
		$codigo = $produto->getCodigo();
		$nome = $produto->getNome();
		$marca = $produto->getMarca();
		$preco = $produto->getPreco();
		$sql = "update produto set nome='$nome', marca='$marca', preco='$preco' where codigo = '$codigo'";
		
		if ($conn->query($sql) === TRUE) {
			return true
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			return false;
		}
   }
   public static function apagar($codigo){
	   $conexao = new Conexao();
	   $conn = $conexao->getConexao();
	   $sql = "delete from produtos where codigo = '$codigo'";
	   if ($conn->query($sql) === TRUE){
			return true;
	   } else {
		   echo "Error: " . $sql . "<br>" . $conn->error;
		   return false;
	   }
   }
   public static function pegaTodos() {
	   $conexao = new Conexao();
	   $conn = $conexao->getConexao();
	   $result = $conn->query('SELECT * FROM produtos');
	   
	   $produtos = [];
	   while ($row = $result->fetch_assoc()) {
		   $produto = new Produto($row["nome"], $row["marca"], $row["preco"]);
		   $produto->setCodigo($row["codigo"]);
		   array_push($produtos, $produto);
	   }
	   return $produtos;
   }
   public static function pegaPorId(int $id){
		$conexao = new Conexao();
		$conn = $conexao->getConexao();
		$result = $conn->query('SELECT * FROM produtos where codigo =' . $id);
		$row = $result->fetch_assoc();
		$produto = new Produto($row["nome"], $row["marca"], $row["preco"]);
		$produto->setCodigo($row["codigo"]);
		return $produto;
   }
}


	/* Explicação
		// Create (C)
		public function salvar($produto){}
		public function pegaTodos(){}
		// Retrieve (R)
		public function pegaPorId($id){}
		// Update (U)
		public function atualizar($produto){}
		// Delete (D)
		public function apagar($id){}	   
	*/
?>

