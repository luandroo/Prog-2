
<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


if(isset($_POST['cadastrar'])){
  $datain = ($_POST['datain']);
  $horain = ($_POST['horain']);
  $dataout = ($_POST['dataout']);
  $horaout = ($_POST['horaout']);
  $quartos = ($_POST['quartos']);
  $cod = ($_GET['cod']);
  $Data = date('Y-m-d');
  $erros = array();
  
  if($quartos == 0){
    $erros[] = "Informe o quarto";
  }
  if($datain == 0){
    $erros[] = "Informe a data de entrada";
  }else{
    if($datain < $Data ){
      $erros[] = "Data de entrada incompatível com data atual";
    }
  }
  if($horain == 0){
    $erros[] = "Informe a hora de entrada";
  }
  if($dataout == 0){
    $erros[] = "Informe a data de saída";
  }else{
    if($dataout < $datain ){
      $erros[] = "Data de saída anterior a data de entrada";
    }
  }
  if($horaout == 0){
    $erros[] = "Informe a hora de saída";
  }




  if(count($erros) == 0){
    $sql = "update cliente_quarto 
      set data_entrada = '$datain', data_saida = '$dataout', hora_entrada='$horain' , hora_saida='$horaout', fk_quartos_Identificador = $quartos
      WHERE cliente_quarto.cod_pagamento = $cod";
    //echo $sql;  
    $con = mysqli_connect($banco, $usuario, $senha, $database);
  
    if(mysqli_query($con, $sql)){
      echo " Edição realizada com sucesso";
    } 
    else{
      echo " Ocorreu um erro no cadastro";
      echo mysqli_error($con);
    }
  echo "<p><a href=\"ger_reservas.php\">Voltar</a></p>";
  mysqli_close($con);
  die(); // interrompe o script
  }
}
?>

  <section class="col-2">
    <h2>Edição de Reserva</h2>
    <br>
  <?php
  if(isset($erros)){
    echo "<p>Foram encontrados os seguintes erros:</p>";
    echo "<ul>";
    for($i=0; $i<count($erros);$i++)
      echo "<li style='color: red'>$erros[$i]</li>";
    echo "</ul>";
  }
  $quartos = isset($_POST['quartos']) ? $_POST['quartos'] : "";
  $datain = isset($_POST['datain']) ? $_POST['datain'] : "";
  $horain = isset($_POST['horain']) ? $_POST['horain'] : "";
  $dataout = isset($_POST['dataout']) ? $_POST['dataout'] : "";
  $horaout = isset($_POST['horaout']) ? $_POST['horaout'] : "";
  ?>

      <form action="" method="post">
        <div class="form-item">
          <label for="quartos" class="rotulo">Quarto:</label>
            <select name="quartos" value="<?=$quartos?>">
              <option value="0" selected>Selecione</option> <!-- Marcado por padrão -->
              <option value="1">Quarto 1</option>
              <option value="2">Quarto 2</option>
              <option value="3">Quarto 3</option>
              <option value="4">Quarto 4</option>
              <option value="5">Quarto 5</option>
              <option value="6">Quarto 6</option>
              <option value="7">Quarto 7</option>
              <option value="8">Quarto 8</option>
              <option value="9">Quarto 9</option>
              <option value="10">Quarto 10</option>
              <option value="11">Quarto 11</option>
              <option value="12">Quarto 12</option>
            </select>
        </div>
        <div class="form-item">
          <label for="datain" class="rotulo">Entrada:</label>
          <input type="date" name="datain" value="<?=$datain?>">
        </div>
        <div class="form-item">
          <label for="horain" class="rotulo">Horário:</label>
          <input type="time" name="horain" value="<?=$horain?>">
        </div>
        <div class="form-item">
          <label for="dataout" class="rotulo">Saída:</label>
          <input type="date" name="dataout" value="<?=$dataout?>">
        </div>
        <div class="form-item">
          <label for="horaout" class="rotulo">Horário:</label>
          <input type="time" name="horaout" value="<?=$horaout?>">
        </div>
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