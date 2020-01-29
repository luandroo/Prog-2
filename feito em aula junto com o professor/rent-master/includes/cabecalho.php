<?php 
session_start();
if(isset($_COOKIE['nome'])){
	$_SESSION['nome'] = $_COOKIE['nome'];
	$_SESSION['id'] = $_COOKIE['id'];
	$_SESSION['endereco'] = $_COOKIE['endereco'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Rent a Tool</title>
	<link rel="stylesheet" type="text/css" href="css/rent.css">
	<link rel="stylesheet" type="text/css" href="css/forms.css">
	<link rel="stylesheet" type="text/css" href="css/carrinho.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> <!-- web font Lobster -->
</head>
<body>

	<!-- cabeçalho -->
	<header>
		<h1><a href="index.php">Rent a Tool</a></h1>
		<div id="menu-login">
			<?php
			if(isset($_SESSION['nome'])){?>
				<span id="login">Olá, <?=$_SESSION['nome'];?> 
				(<a href="sair.php">sair</a>)</span>
			<?php
			}
			else{?>
				<span id="login">Olá, visitante! (<a href="login.php">login</a>)</span>
			<?php
			}
			?>
			<span id="carrinho"><a href="carrinho.php">Meu carrinho <span id="numItensCarrinho">(<?=isset($_SESSION['carrinho'])?count($_SESSION['carrinho']):"0";?>)</span><img src="img/cart.png" width="32" alt="carrinho de compras"></a></span>			
		</div>
        <p id="exibe-menu">Menu</p>
		<nav class="menu-opcoes">    
			<ul>
				<li><a href="login.php">Minha Conta</a></li>
				<li><a href="#">Programa de pontos</a></li>
				<li><a href="#">Consumo solidário</a></li>
				<li><a href="#">Quem somos</a></li>
				<li><a href="#">Ajuda</a></li>
			</ul>
		</nav>
	</header>
	<!-- fim cabeçalho -->