<?php
	$base = __DIR__;
	include $base .'\..\layout\menu.php'; 
	//debug_print_backtrace();
?>

<?php 
// Imprime uma mensagem "Sucesso" caso o cadastro tenha sido feito sem problemas.
    if(isset($data["msg"])){
?>
<div class="alert alert-success" role="alert"> Sucesso </div>
	<?php } ?>
	
<!-- Formulário para o cadastro do produto -->
<form action="/usuario/salvar" method="POST" class="form-control">
	<label> Nome Usuário </label>
	<input type="text" name="nomeUsuario" class="form-control" />
	
	<label> Email </label>
	<input type="text" name="email" class="form-control"/>
	
	<label> Senha </label>
	<input type="text" name="senha" class="form-control"/>
	
	<input type="submit" value="Cadastrar" class="form-control"/>
</form>
