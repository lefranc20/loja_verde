<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
 $usuario = $data['usuario'];
?>
<form class="form-control" method="POST" action="/usuario/atualizar">
	<input type="hidden" value="<?= $usuario->getId() ?>" name="id"/>
	
	<label class="label"> Nome do Usuário </label>
	<input type="text" value="<?= $usuario->getNomeUsuario() ?>" name="nomeUsuario" class="form-control"/>
	
	<label class="label"> Senha </label>
	<input type="text" value="<?= $usuario->getSenha() ?>" name="senha" class="form-control" />
	
	<label class="label"> Email </label>
	<input type="text" value="<?= $usuario->getEmail() ?>" name="email" class="form-control" />
	
	<div class="row" style="margin-top: 5px">
		<input type="submit" value="Alterar" class="btn btn-info" />
	</div>
</form>