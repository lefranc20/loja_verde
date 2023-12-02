<?php
	$base = __DIR__;
	include $base . '\..\layout\menu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
	<style>
		body {
			font-family: 'Arial', sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		h1 {
			color: #333;
			text-align: center;
		}

		.alert {
			margin: 20px 0;
			padding: 15px;
			border-radius: 4px;
		}

		.alert-danger {
			background-color: #f8d7da;
			border-color: #f5c6cb;
			color: #721c24;
			text-align: center;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #007bff;
			color: #fff;
		}
		.botaoDeAcao {
			background-color: #007bff;
			color: #fff;
			padding: 5px 10px;
			text-decoration: none;
			display: inline-block;
			border: none;
			cursor: pointer;
			<!-- font-weight: bold; -->
			margin-right: 10px;
			transition: background-color 0.3s;
			border-radius: 6px;
		}

		.botaoDeAcao: hover {
			background-color: #0056b3;
		}
		
		#botaoExcluir{
			background-color: #D22026;
		}
	</style>
</head>
<body>
    <h1>Lista de Produtos Cadastrados no Sistema</h1>
    <?php if (isset($data['msg-deletar'])) { ?>
        <div class="alert alert-danger" role="alert">Produto deletado com sucesso</div>
    <?php } ?>
    <p><a href="/produto/cadastrar" class="botaoDeAcao">Adicionar Produto</a></p>
    <table>
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Imagem</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['produtos'] as $produto) { ?>
                <tr>
                    <td><?= $produto->getCodigo() ?></td>
                    <td><?= $produto->getNome() ?></td>
                    <td><?= $produto->getMarca() ?></td>
                    <td><?= $produto->getPreco() ?></td>
                    <td><img src="<?= $produto->getImagem() ?>" alt="Sem imagem" style="width: 150px;  height: auto"></td>
                    <td>
						<!-- Botão de Editar -->
                        <a href="/produto/iniciarEditar/<?= $produto->getCodigo() ?>" class="botaoDeAcao">Editar</a>
						
						<!-- Botão de Excluir -->
                        <form action="/produto/deletar" method="POST" style="display: inline;">
                            <input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
                            <button type="button" id="botaoExcluir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Excluir
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Exclusão</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Você deseja mesmo excluir o produto? 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                    <button type="submit" class="btn btn-primary">Sim</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
