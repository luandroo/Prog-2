<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


$data = date('y-m-d');
//echo "$data";

$sql = "SELECT cliente.Nome, cliente.CPF, cliente_quarto.data_entrada, cliente_quarto.cod_pagamento, cliente_quarto.data_saida, cliente_quarto.hora_entrada, cliente_quarto.hora_saida, quartos.Identificador, quartos.Numero, pagamento.valor
FROM cliente 
  LEFT JOIN cliente_quarto ON cliente_quarto.fk_cliente_CPF = cliente.CPF 
  LEFT JOIN quartos ON cliente_quarto.fk_quartos_Identificador = quartos.Identificador
  LEFT JOIN pagamento ON pagamento.fk_cliente_quarto_cod_pagamento = cliente_quarto.cod_pagamento
WHERE cliente_quarto.data_saida > '$data'";
//echo "$sql";

  $resultado = mysqli_query($con, $sql);
?>

<h2>Gerenciamento de Reservas</h2>


<?php
if(mysqli_num_rows($resultado) == 0){
  echo "<p>Nenhum evento cadastrado</p>";
}
else {
?>
  <table border="1">
    <tr>
      <th>Nome</th>
      <th>CPF</th>
      <th>Data entrada</th>
      <th>Data saída</th>
      <th>Hora entrada</th>
      <th>Hora saída</th>
      <th>ID Quarto</th>
      <th>N° Quarto</th>
      <th>Pagamento</th>

      <th colspan="3">Gerenciar</th>
    </tr>

    <?php
      while($temp = mysqli_fetch_array($resultado)){
    ?>
    <tr>
      <td><?=$temp['Nome']?></td>
      <td><?=$temp['CPF']?></td>
      <td><?=$temp['data_entrada']?></td>
      <td><?=$temp['data_saida']?></td>
      <td><?=$temp['hora_entrada']?></td>
      <td><?=$temp['hora_saida']?></td>
      <td><?=$temp['Identificador']?></td>
      <td><?=$temp['Numero']?></td>
      <?php
        if($temp['valor'] > 0){
          echo "<td>Ok</td>";
          echo "<td>Editar</td>";
          echo "<td>Excluir</tr>";

        }else{
      ?>
        <td><a href="cad_pagamento.php?cod=<?=$temp['cod_pagamento']?>">Efetuar</a></td>
        <td><a href="edi_reserva.php?cod=<?=$temp['cod_pagamento']?>">Editar</a></td>
        <td><a href="exc_reserva.php?cod=<?=$temp['cod_pagamento']?>">Excluir</a></tr>
        <?php 
        }//fecha else
        ?>
    </td>

  <?php
  }
  ?>

  </table>
<?php
} // fecha else
?>
<br>

</body>
<?php
include "incluir/rodapeAdm.php";  
?>
</html>