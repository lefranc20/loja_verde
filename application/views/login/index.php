<!-- Página de Login -->
<?php
	$base = __DIR__;
	include $base .'\..\layout\menu.php'; 
	//debug_print_backtrace();
?>
 
<hr/>

<div class="container">
	<h2>Login</h2>
	<form class="form-horizontal" action="/usuario/loginUsuario">
		<!-- Nome do Usuário -->
		<div class="form-group">
			<label class="control-label col-sm-2" for="text">Nome de Usuário:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nomeUsuario" placeholder="Nome" name="nomeUsuario">
			</div>
		</div>
		
		<!-- Senha -->
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Senha:</label>
			<div class="col-sm-5">          
				<input type="password" class="form-control" id="pwd" placeholder="Insira a Senha" name="senha">
			</div>
		</div>
		<br>
		<div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
	</form>
</div>

<hr>

<!-- Cadastro -->
<p>Caso não tenha um login, se <a href='/usuario/cadastrar/'/><b>Cadastre aqui</b></a></p>
</body>
</html>