<!DOCTYPE html>
<html lang="en">
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
<form>
<hr />
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="E-mail">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Senha">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <button type="submit" class="btn btn-primary">Logar</button>
  
</form>
</body>
</html>