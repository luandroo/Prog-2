<!DOCTYPE html>
<html lang="pt-br">

<?php
//include_once "incluir/conexao.php";
?>

<head>
	<title>RosterItali Hoteis</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="shortcut icon" type="image/x-icon" href="imagens/logo4.png">
	<link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
</head>
<body>
	<header>
		<div class="cabecalho">
			<img src="imagens/logo4.png" class="imag" alt="logo-marca do servidor">
			<h1 id="nomehotel">HOSTERITALI</h1>
			<?php
			if(!isset($_SESSION['usuario']) & !isset($_SESSION['senha'])){
				echo "<input type=\"submit\" name=\"botao\" onclick=\"location.href='sair.php'\"value=\"Sair\">";
			}
			?>
		</div>
	</header>

	<div class="principal">
		<section class="col-1">

			<section class="caixa">
				<nav class="menu">
					<ul>
						<li><a href="index.php"> Página inicial</a></li>
						<li><a href="quartos.php"> Quartos</a></li>
						<li><a href="locacao.php"> Locação</a></li>
						<li><a href="contato.html"> Contato</a></li>
						<li><a href="gerenciamento.php"> Gerenciamento</a></li>
					</ul>
				</nav>
			</section>
		</section>
	</div>
