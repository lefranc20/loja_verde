<html>
	<head>

	</head>

	<body>
		<?php
			use Application\dao\ProdutoDAO;
			$base = __DIR__;
			include $base .'\..\layout\menu.php';
		?>
		<p> <a href="/produto/cadastrar"> Adicionar Produto  </a> </p>
		<hr/>
		<h1> Listar Produtos </h1>
		<table>
			<thead>
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Nome</th>
					<th scope="col">Preço</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['produtos'] as $produto) { ?>
					<tr>
						<td><?= $produto->getCodigo() ?></td>
						<td><?= $produto->getNome() ?></td>
						<td><?= $produto->getPreço() ?></td>
						<td>
						
							<a href="/produto/cadastrar/<?= $produto->getCodigo() ?>">
								<i data-feather="edit"></i>
							</a>
							
							<!-- Para alteração póstuma
								<a href="/produto/deletar/<?= $produto->getCodigo() ?>"> <i data-feather="x-square"></i></a>
							-->
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</body>
</html>