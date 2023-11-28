<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
    $base = __DIR__;
    include $base .'\..\layout\menu.php'; 
    //debug_print_backtrace();
 ?>
 <?php 
    if(isset($data["msg-cadastrado"])){
?>
<div class="alert alert-success" role="alert"> Sucesso </div>
	<?php } ?>
<hr />

<div class="container">
  <h2>Cadastrar</h2>
  <br>
  <form class="form-horizontal" action="/usuario/cadastrarUsuario" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="nome-Usuario">Nome de Usuário:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="nomeUsuario" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
      </div>
    </div>
	<br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="senha">Senha:</label>
      <div class="col-sm-5">          
        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="senha">Insira a senha novamente:</label>
      <div class="col-sm-5">          
        <input type="password" class="form-control" id="senha" placeholder="Confirmar Senha" name="senhaRepetir" required>
      </div>
    </div>
	<br>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </form>
</div>

<hr>
</body>
</html>