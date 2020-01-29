
<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


$sql = "delete from cliente_quarto where cod_pagamento = {$_GET['cod']}";
//echo $sql;
    $con = mysqli_connect($banco, $usuario, $senha, $database);
  
    if(mysqli_query($con, $sql)){
      echo " Exclusão realizada com sucesso";
    } 
    else{
      echo " Ocorreu um erro na exclusão";
      echo mysqli_error($con);
    }
  echo "<p><a href=\"ger_reservas.php\">Voltar</a></p>";
  mysqli_close($con);
  die(); // interrompe o script
?>

</body>
<?php
include "incluir/rodapeAdm.php";
?>
</html>