
<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


if(isset($_POST['cadastrar'])){
  $Nome = ($_POST['Nome']);
  $RG = ($_POST['RG']);
  $CPF = $_POST['CPF'];
  $Endereco = ($_POST['Endereco']);
  $Telefone = ($_POST['Telefone']);
  $email = $_POST['email'];
//$Data_nascimento = ($_POST['Data_nascimento']);
  $erros = array();
  
  if(empty($Nome)){
    $erros[] = "Informe o nome";
  } 
  if($RG == 0){
    $erros[] = "Informe o numero do RG";
  }
  if($CPF == 0){
    $erros[] = "Informe o numero do CPF";
  }
  if(empty($Endereco)){
    $erros[] = "Informe o endereço";
  }
  if($Telefone == 0){
    $erros[] = "Informe o numero do telefone";
  } 
  if(empty($email)){
    $erros[] = "Informe o email";
  } 

  if(count($erros) == 0){
    $sql = "insert into cliente 
      (Nome, RG, CPF, Endereco, Telefone, email)
      values 
      ('$Nome', $RG , $CPF,'$Endereco', $Telefone,'$email')";
    //echo $sql;
    $con = mysqli_connect($banco, $usuario, $senha, $database);
  
    if(mysqli_query($con, $sql)){
      echo " Cadastro realizado com sucesso";
    } 
    else{
      echo " Ocorreu um erro no cadastro";
      echo mysqli_error($con);
    }
  echo "<p><a href=\"ger_cliente.php\">Voltar</a></p>";
  mysqli_close($con);
  die(); // interrompe o script
}
}
?>

	<section class="col-2">
		<h2>Cadastro de clientes</h2>
		<br>
		<?php
		if(isset($erros)){
		  echo "<p>Foram encontrados os seguintes erros:</p>";
		  echo "<ul>";
		  for($i=0; $i<count($erros);$i++)
		    echo "<li style='color: red'>$erros[$i]</li>";
		  echo "</ul>";
		}
		$Nome = isset($_POST['Nome']) ? $_POST['Nome'] : "";
		$RG = isset($_POST['RG']) ? $_POST['RG'] : "";
		$CPF = isset($_POST['CPF']) ? $_POST['CPF'] : "";
		$Endereco = isset($_POST['Endereco']) ? $_POST['Endereco'] : "";
		$Telefone = isset($_POST['Telefone']) ? $_POST['Telefone'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		?>

		<form action="" method="post" id="vali">
			<div class="form-item">
				<label for="nome" class="rotulo">Nome:</label>
				<input type="text" name="Nome" size="100" id="nome" value="<?=$Nome?>" placeholder="Informe seu Nome completo">
				<span class="msg-erro" id="msg-nome"></span>
			</div>
			<div class="form-item">
				<label for="email" class="rotulo">E-mail:</label>
				<input type="email" name="email" size="50"id="email" value="<?=$email?>" placeholder="Informe Seu E-mail">
				<span class="msg-erro" id="msg-email"></span>
			</div>
			<div class="form-item">
				<label for="senha" class="rotulo">Senha</label>
				<input type="password" name="senha" size="50"  id="senha" placeholder="Informe a Senha">
				<span class="msg-erro" id="msg-senha"></span>
			</div>
			<div class="form-item">
				<label for="senhubmit" name="botao" value="Cona2" class="rotulo">Repitir a Senha</label>
				<input type="password" name="senha2" size="50" id="senha"placeholder="Informe Novamente a Senha">
				<span class="msg-erro" id="msg-senha2"></span>
			</div>
			<div class="form-item">
				<label for="fone" class="rotulo">Telefone:</label>
				<input type="tel" name="Telefone" id="fone" size="10" value="<?=$Telefone?>" placeholder="Informe o seu Telefone">
				<span class="msg-erro" id="msg-fone"></span>
			</div>
			<div class="form-item">
				<label for="cpf" class="rotulo">CPF:</label>
				<input type="text" name="CPF" id="cpf" size="11" value="<?=$CPF?>" placeholder="Informe seu CPF com 9 digitos" >
				<span class="msg-erro" id="msg-cpf"></span>
			</div>
			<div class="form-item">
				<label for="rg" class="rotulo">RG:</label>
				<input type="text" name="RG" id="rg" size="12" value="<?=$RG?>" placeholder="Informe seu Numero do RG" >
				<span class="msg-erro" id="msg-rg"></span>
			</div>
			<div class="form-item">
				<label for="ender" class="rotulo">Endereço:</label>
				<input type="text" name="Endereco" size="50" id="ender" value="<?=$Endereco?>" placeholder="Informe Seu endereço">
				<span class="msg-erro" id="msg-ender"></span>
			</div>
			<div class="form-item">
				<label class="label-alinhado"></label>
				<label><input type="checkbox" id="concordo" name="concordo"> Li e concordo com os termos de uso</label>
				<span class="msg-erro" id="msg-concordo"></span>
			</div>
			<div class="form-item">
			    <input type="submit" name="cadastrar" value="Cadastrar">
				<input type="reset" name="limpar" value="Limpar">
			</div>
			<br>
		</form>
	</section>
	<br>
	<script src="js/function.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/verifica.js"></script>
</body>
<?php
include "incluir/rodapeAdm.php";
?>
</html>