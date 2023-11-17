<html>

	<!-- Importa teus estilos na head caso queira -->
	<head>
	
	
	</head>

	<!-- Corpo Principal da página de cadastro -->
	<body>
		<?php
			$base = __DIR__;
			include $base .'\..\layout\menu.php'; 
			//debug_print_backtrace();
		 ?>
	
		<form action="/produto/salvar" method="POST">
			<label> Nome Produto </label>
			<input type="text" name="nome_produto" />
			
			<label> Marca do Produto </label>
			<input type="text" name="marca" />

			<label> Preço </label>
			<input type="text" name="preco" />
						
			<input type="submit" value="Cadastrar" />
		</form>
	</body>
	
</html>
