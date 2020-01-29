
<?php
include "incluir/cabecalhoAdm.php"; 
include "incluir/conexao.php";

  $Nome = ($_POST['nome']);
  $email = $_POST['email'];
  $pass = $_POST['senha'];
  $Telefone = ($_POST['fone']);
  $RG = ($_POST['rg']);
  $CPF = $_POST['cpf'];
  $Endereco = ($_POST['ender']);


    $sql = "insert into cliente 
      (Nome, RG, CPF, Endereco, Telefone, email, senha)
      values 
      ('$Nome', $RG , $CPF,'$Endereco', $Telefone,'$email', '$pass')";
    //echo $sql;


  
    if(mysqli_query($conexao, $sql)){
      echo " Cadastro realizado com sucesso";
    } 
    else{
      echo " Ocorreu um erro no cadastro";
      echo mysqli_error($conexao);
    }
  echo "<p><a href=\"cadastro.html\">Voltar</a></p>";
  mysqli_close($conexao);
  //header("Location: entrar.html");//volta para pagina de login
  die(); // interrompe o script

?>

		
</body>
<?php
include "incluir/rodapeAdm.php";
?>
</html>