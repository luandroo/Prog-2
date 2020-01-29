<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


  $sql = "select Nome, Telefone, email, CPF from cliente";
  $resultado = mysqli_query($con, $sql);
?>

<h2>Gerenciamento de clientes</h2>
<p><a href="cad_cliente.php">Inserir novo cliente</a></p>


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
      <th>Telefone</th>
      <th>Email</th>
      <th>Gerenciar</th>
    </tr>

    <?php
      while($temp = mysqli_fetch_array($resultado)){
    ?>
    <tr>
      <td><?=$temp['Nome']?></td>
      <td><?=$temp['CPF']?></td>
      <td><?=$temp['Telefone']?></td>
      <td><?=$temp['email']?></td>
      <td><a href="edi_cliente.php?cod=<?=$temp['CPF']?>">Editar</a></tr>
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