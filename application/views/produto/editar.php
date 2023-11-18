<?php
	$base = __DIR__;
	include $base .'\..\layout\menu.php';
	$produto = $data['produto'];
?>

<form class="form-control" method="POST" action=''>
	<input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
	<label> Nome </label>
	<input type="text" value="<?= $produto->getNome() ?>" name="nome"/>
	
	<label> Marca </label>
	<input type="text" value="<?= $marca->getMarca() ?>" name="marca"/>
	
	<input type="submit" value="Alterar" class="btn btn-info" />
</form>