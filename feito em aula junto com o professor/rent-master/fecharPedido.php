<?php include "includes/cabecalho.php"; 
if(!isset($_SESSION['id'])) // usuario nao logado
	header("Location: login.php");
?>
	<!-- area central com 3 colunas -->
	<div class="container">
	<?php include "includes/menu_lateral.php"; ?>	
		<section class="col-2">
			<h2>Finalizar pedido</h2>
			<?php
			if(!isset($_SESSION['carrinho']))
				echo "<p>Seu carrinho está vazio</p>";
			else{
				if(isset($_POST['finalizar'])){
					include "classes/Pedido.php";
					$_SESSION['frete'] = $_POST['frete'];
					$novo = new Pedido();
					if($novo->cadastrar()){
						echo "<p>Seu pedido foi finalizado. Acompanhe o status na opção Minha Conta</p>";
						unset($_SESSION['carrinho']);
					}
					else{
						echo "<p>Ocorreu um erro ao registrar o pedido</p>";
					}

				}
			}
			?>
		</section>
        <?php include "includes/mais_vendidos.php"; ?>
	</div>
	<!-- fim area central -->
<?php include "includes/rodape.php"; ?>	