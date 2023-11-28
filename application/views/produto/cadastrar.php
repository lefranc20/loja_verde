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
<form action="/produto/salvar" method="POST" class="form-control">
	<label> Nome Produto </label>
	<input type="text" name="nome_produto" class="form-control" />
	
	<label> Marca </label>
	<input type="text" name="marca" class="form-control"/>
	
	<label> Preço </label>
	<input type="text" name="preco" class="form-control"/>
	
	<input type="submit" value="Cadastrar" class="form-control"/>
</form>
