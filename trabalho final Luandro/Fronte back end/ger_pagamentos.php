<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


$sql = "SELECT cliente.Nome, cliente.CPF, cliente_quarto.data_entrada, quartos.Identificador, quartos.Numero, pagamento.cod, pagamento.Forma_pagamento, pagamento.valor
FROM cliente 
	LEFT JOIN cliente_quarto ON cliente_quarto.fk_cliente_CPF = cliente.CPF 
	LEFT JOIN quartos ON cliente_quarto.fk_quartos_Identificador = quartos.Identificador 
	LEFT JOIN pagamento ON pagamento.fk_cliente_quarto_cod_pagamento = cliente_quarto.cod_pagamento
WHERE pagamento.cod >= '0';";


  $resultado = mysqli_query($con, $sql);
?>

<h2>Pagamentos</h2>

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
      <th>ID Quarto</th>
      <th>N° Quarto</th>
      <th>Cod Pagamento</th>
      <th>Forma Pagamento</th>
      <th>Valor</th>
      <th>Gerenciar</th>
    </tr>

    <?php
      while($temp = mysqli_fetch_array($resultado)){
    ?>
    <tr>
      <td><?=$temp['Nome']?></td>
      <td><?=$temp['CPF']?></td>
      <td><?=$temp['data_entrada']?></td>
      <td><?=$temp['Identificador']?></td>
      <td><?=$temp['Numero']?></td>
      <td><?=$temp['cod']?></td>
      <td><?=$temp['Forma_pagamento']?></td>
      <td><?=$temp['valor']?></td>
      <td><a href="edi_pagamento.php?cod=<?=$temp['cod']?>">Editar</a></tr>
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