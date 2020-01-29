
<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


if(isset($_POST['cadastrar'])){
  $CPF = $_GET['cod'];
  $Endereco = ($_POST['Endereco']);
  $Telefone = ($_POST['Telefone']);
  $email = $_POST['email'];
  $erros = array();
  
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
    $sql = "update cliente
        set Telefone=$Telefone, email='$email', Endereco='$Endereco'
        WHERE cliente.CPF = $CPF";

    if(mysqli_query($con, $sql)){
      echo " Edição de cliente realizada com sucesso";
    } 
    else{
      echo " Ocorreu um erro na Edição do cliente";
      echo mysqli_error($con);
    }
  echo "<p><a href=\"ger_cliente.php\">Voltar</a></p>";
  mysqli_close($con);
  die(); // interrompe o script
  }
}
?>

  <section class="col-2">
    <h2>Edição de clientes</h2>
    <br>

  <?php
  if(isset($erros)){
    echo "<p>Foram encontrados os seguintes erros:</p>";
    echo "<ul>";
    for($i=0; $i<count($erros);$i++)
      echo "<li style='color: red'>$erros[$i]</li>";
    echo "</ul>";
  }
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $Telefone = isset($_POST['Telefone']) ? $_POST['Telefone'] : "";
  $Endereco = isset($_POST['Endereco']) ? $_POST['Endereco'] : "";
  ?>
    <form action="" method="post" id="vali">
      <div class="form-item">
        <label for="email" class="rotulo">E-mail:</label>
        <input type="email" name="email" size="50"id="email" value="<?=$email?>" placeholder="Informe Seu E-mail">
      </div>
      <div class="form-item">
        <label for="fone" class="rotulo">Telefone:</label>
        <input type="tel" name="Telefone" id="fone" size="10" value="<?=$Telefone?>" placeholder="Informe o seu Telefone">
      </div>
      <div class="form-item">
        <label for="ender" class="rotulo">Endereço:</label>
        <input type="text" name="Endereco" size="50" id="ender" value="<?=$Endereco?>" placeholder="Informe Seu endereço">

      <div class="form-item">
        <input type="submit" name="cadastrar" value="Editar">
        <input type="reset" name="limpar" value="Limpar">
      </div>
      <br>
    </form>
  </section>
  <br>
</body>
<?php
include "incluir/rodapeAdm.php";
?>
</html>