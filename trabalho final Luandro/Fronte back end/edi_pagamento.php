
<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


if(isset($_POST['cadastrar'])){
  $f_pag = ($_POST['f_pag']);
  $valor = ($_POST['valor']);
  $cod = ($_GET['cod']);
  $erros = array();
  
  if(empty($f_pag)){
    $erros[] = "Informe a forma de pagamento";
  } 
  if($valor == 0){
    $erros[] = "Informe o valor";
  }

  $Data = date('y-m-d');
  $hora = date('H:i:s');

  if(count($erros) == 0){
    $sql = "update pagamento 
      set Forma_pagamento = '$f_pag', valor = $valor, Data='$Data' , hora='$hora'
      WHERE pagamento.cod = $cod";
    //echo $sql;  
    $con = mysqli_connect($banco, $usuario, $senha, $database);
  
    if(mysqli_query($con, $sql)){
      echo " Edição realizada com sucesso";
    } 
    else{
      echo " Ocorreu um erro no cadastro";
      echo mysqli_error($con);
    }
  echo "<p><a href=\"ger_pagamentos.php\">Voltar</a></p>";
  mysqli_close($con);
  die(); // interrompe o script
  }
}
?>

  <section class="col-2">
    <h2>Edição de Pagamentos</h2>
    <br>
  <?php
  if(isset($erros)){
    echo "<p>Foram encontrados os seguintes erros:</p>";
    echo "<ul>";
    for($i=0; $i<count($erros);$i++)
      echo "<li style='color: red'>$erros[$i]</li>";
    echo "</ul>";
  }
  $f_pag = isset($_POST['f_pag']) ? $_POST['f_pag'] : "";
  $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
  ?>

    <form action="" method="post">

      <div class="form-item">
        <label class="rotulo">Forma de pagamento:</label>
        <input type="text" name="f_pag" value="<?=$f_pag?>" placeholder="Boleto, cheque, dinheiro...">
      </div> 
      <div class="form-item">
        <label class="rotulo">Valor:</label>
        <input type="text" name="valor" value="<?=$valor?>" placeholder="Informe o valor">
      </div>  

      <div class="form-item">
        <input type="submit" name="cadastrar" value="Editar">
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