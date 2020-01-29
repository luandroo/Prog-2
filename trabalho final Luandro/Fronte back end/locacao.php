<?php
include "incluir/conexao.php";
include "incluir/cabecalho.php";
require_once "Quartos.php";

function mostraImagem($nomeArquivo){
	if($nomeArquivo =='')
		return "default.jpg";
	else
		return $nomeArquivo;
}

$obj = new Quartos();

@$quarto = $obj->Mostra1($_GET['Identificador']);


@$data_entrada = $_POST['datain'];
@$data_saida = $_POST['dateout'];
@$hora_entrada = $_POST['horain'];
@$hora_saida = $_POST['horaout'];
@$cpf = $_POST['cpf'];

$sql = "INSERT INTO cliente_quarto(data_entrada, data_saida, hora_entrada, hora_saida, fk_quartos_Identificador, fk_cliente_CPF) VALUES (?, ?, ?,?,?,?)";
if(isset($_POST['confirmar'])){
	$statement = $conexao->prepare($sql);
	$statement->bind_param("ssssis", $data_entrada, $data_saida, $hora_entrada, $hora_saida, $quarto[0]['Identificador'],$cpf);
	$statement->execute();
}

?>

		<section class="col-2">
			<form action="locacao.php" method="post">
			<!-- dentro do form é salvo os dados para ir para o servidor -->
			<div class="form-item">
				<figure>
					<img src="imagens/<?=mostraImagem($quarto[0]['imagem']);?>" alt="<?=$quarto[0]['Tipo'];?>">
				</figure>
			</div>
				<h2><?=$quarto[0]['Tipo'];?></h2>
				<input type="hidden" name="Identificador" value="<?=$quarto[0]['Identificador']?>">
				<div class="form-item">
					<label for="datain" class="rotulo">Entrada:</label>
					<input type="date" id="datain" name="datein">
				</div>
				<div class="form-item">
					<label for="horain" class="rotulo">Horário:</label>
					<input type="time" id="horain" name="horain">
				</div>
				<div class="form-item">
					<label for="dataout" class="rotulo">Saída:</label>
					<input type="date" id="dateout" name="dateout">
				</div>
				<div class="form-item">
					<label for="horaout" class="rotulo">Horário:</label>
					<input type="time" id="horaout" name="horaout">
				</div>
				<div class="form-item">
					<label for="cpf" class="rotulo">CPF:</label>
					<input type="text" name="cpf" id="cpf" size="11" maxlength="11">
				</div>
				<div class="form-item">
					<input type="submit" name="confirmar" value="confirmar">
					<input type="reset" name="reset" value="Limpar campos">
				</div>
				<br>

			</form>

		</section>
		<br>
	</div>
	<footer>
		<p id="hotel">HosterItali Hotel</p>
	</footer>
	<script src="js/function.js"></script>
	<script src="js/menu.js"></script>
</body>
</html>
