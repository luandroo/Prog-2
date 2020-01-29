<?php
session_start();
$_SESSION['carrinho'][$_POST['idProduto']]['quantidade'] = $_POST['quantidade'];

// calculando total
$total = 0;
foreach ($_SESSION['carrinho'] as $produto) {
	$valorItem = $produto['quantidade'] * $produto['valorFinal'];
	$total += $valorItem;
}
echo $total; // retorna o novo total para o objeto req do navegador

?>