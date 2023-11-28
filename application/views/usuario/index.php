<?php
	$base = __DIR__;
	include $base . '\..\layout\menu.php';
?>
<html>

<head>
</head>

<body>
	<h1> Usuários cadastrados no sistema </h1>
	<hr/>
	<?php if( isset($data['msg'])){ ?> 
		<div class="alert alert-danger" role="alert"> Sucesso </div>
	<?php } ?>
	<p> <a href="/usuario/cadastrar"> Adicionar Usuario </a> </p>
	<table class="table">
		<thead>
			<th>Id</th>
			<th>Nome</th>
			<th>Senha</th>
			<th>Email</th>
			<th>Ações</th>
		</thead>
		<tbody>
		<?php foreach ($data['usuarios'] as $usuario) { ?>
			<tr>
				<td><?= $usuario->getId() ?> </td>
				<td><?= $usuario->getNomeUsuario() ?> </td>
				<td><?= $usuario->getSenha() ?> </td>
				<td><?= $usuario->getEmail() ?> </td>
				<td>
				<a href="/usuario/iniciarEditar/<?= $usuario->getId() ?>">EDITAR</a>
				<span>
					<form action="/usuario/deletar" method="POST"> 
						<input type="hidden" value="<?= $usuario->getId() ?>" name="id" />
						<input type="submit" value="X" />
					</form> 
				</span>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>

</html>