<?php
include "incluir/cabecalhoAdm.php"; 
include_once "incluir/conexao.php";


  $sql = "select Numero, Andar, Identificador, Tipo from quartos";
  $resultado = mysqli_query($con, $sql);
?>

<h2>Gerenciamento de quartos</h2>
<p><a href="cad_quartos.php">Inserir novo quarto</a></p>


<?php
if(mysqli_num_rows($resultado) == 0){
  echo "<p>Nenhum evento cadastrado</p>";
}
else {
?>
    <table border="1">
      <tr>
        <th>Numero</th>
        <th>Andar</th>
        <th>Identificador</th>
        <th>Tipo</th>
        <th colspan="2">Gerenciar</th>
      </tr>

      <?php
        while($temp = mysqli_fetch_array($resultado)){
      ?>
      <tr>
        <td><?=$temp['Numero']?></td>
        <td><?=$temp['Andar']?></td>
        <td><?=$temp['Identificador']?></td>
        <td><?=$temp['Tipo']?></td>
        <td>editar</td>
        <td>excluir</tr>
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