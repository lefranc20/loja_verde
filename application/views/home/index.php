<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
//debug_print_backtrace();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

<style>
  body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h1 {
        color: #333;
        text-align: center;
    }

    .alert {
        margin: 20px 0;
        padding: 15px;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }
    </style>
</head>


<body>
    <h1>Bem-Vindo!</h1>
    <hr />
    <h2>Veja nossa lista de produtos!</h2>
    <?php
    if (isset($data["msg-valido"])) {
        ?>
        <div class="alert alert-success" role="alert">Sucesso ao autenticar</div>
    <?php } ?>
	
	<!-- Visualização dos produtos estilo cards no home/index -->
	<?php if (isset($data['produtos'])): ?>
	<div class="row">
		<?php foreach ($data['produtos'] as $produto): ?>
			<div class="col-md-2 mb-3">
				<div class="card">
					<img src="<?= $produto->getImagem() ?>" class="card-img-top" alt="Sem imagem" style="width: 100%;">
					<div class="card-body">
						<h5 class="card-title"><?= $produto->getNome() ?></h5>
						<p class="card-text">Marca: <?= $produto->getMarca() ?></p>
						<p class="card-text">Preço: R$<?= $produto->getPreco() ?></p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php else: ?>
		<p>Nenhum produto cadastrado.</p>
	<?php endif; ?>

</body>
</html>



