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
 
<hr />

<div class="container">
  <h2>Login</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="email" placeholder="Insira o Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Senha:</label>
      <div class="col-sm-5">          
        <input type="password" class="form-control" id="pwd" placeholder="Insira a Senha" name="pwd">
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

<p>Caso não tenha um login, se <a href='/usuario/cadastro/'/><b>Cadastre aqui</b></a></p>
</body>
</html>