
<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


if(isset($_POST['cadastrar'])){
  $Numero = ($_POST['Numero']);
  $Andar = ($_POST['Andar']);
  $Tipo = $_POST['Tipo'];
  $erros = array();
  
  if(empty($Numero)){
    $erros[] = "Numero do quarto nao informado";
  } 
  if($Andar == 0){
    $erros[] = "Andar do quarto nao informado";
  }
  if(empty($Tipo)){
    $erros[] = "Tipo do quarto nao informado";
  }
  if(count($erros) == 0){
    $sql = "insert into quartos 
      (Numero, Andar, Tipo)
      values 
      ($Numero, $Andar, '$Tipo')";
    //echo $sql;  
    $con = mysqli_connect($banco, $usuario, $senha, $database);
  
    if(mysqli_query($con, $sql)){
      echo " Cadastro realizado com sucesso";
    } 
    else{
      echo " Ocorreu um erro no cadastro";
      echo mysqli_error($con);
    }
  echo "<p><a href=\"ger_quartos.php\">Voltar</a></p>";
  mysqli_close($con);
  die(); // interrompe o script
  }
}
?>

  <section class="col-2">
    <h2>Cadastro de quartos</h2>

<?php
  if(isset($erros)){
    echo "<p>Foram encontrados os seguintes erros:</p>";
    echo "<ul>";
    for($i=0; $i<count($erros);$i++)
      echo "<li style='color: red'>$erros[$i]</li>";
    echo "</ul>";
  }
  $Numero = isset($_POST['Numero']) ? $_POST['Numero'] : "";
  $Andar = isset($_POST['Andar']) ? $_POST['Andar'] : "";
  $Tipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : "";
?>
    <form action="" method="post">

      <div class="form-item">
        <label class="rotulo">Numero:</label>
        <input type="text" name="Numero" value="<?=$Numero?>" placeholder="Numero do quarto">
      </div> 
      <div class="form-item">
        <label class="rotulo">Andar:</label>
        <input type="text" name="Andar" value="<?=$Andar?>" placeholder="Informe o andar">
      </div>  
      <div class="form-item">
        <label class="rotulo">Tipo:</label>
        <input type="text" name="Tipo" value="<?=$Tipo?>" placeholder="Descricão">
      </div>
      
      <div class="form-item">
        <input type="submit" name="cadastrar" value="Cadastrar">
        <input type="reset" name="limpar" value="Limpar">
      </div>
    </form>
  </section>
  <br>
</body>
<?php
include "incluir/rodapeAdm.php";
?>
</html>