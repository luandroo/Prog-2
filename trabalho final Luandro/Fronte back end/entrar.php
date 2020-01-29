
<?php

include "incluir/cabecalhoAdm.php"; 
include "incluir/conexao.php";

  @$cpf = $_POST['cpf'];
  @$senha = $_POST['senha'];

  $statement = $conexao->prepare("select CPF, senha, Nome from cliente where CPF = ?");
  $statement->bind_param("s", $cpf);

  $statement->execute();
  
  $result = $statement->get_result();
  $logins = $result->fetch_assoc();

    if($senha != $logins['senha']){   //caso a variavel 'senha' não possua o valor correto
      
      echo "senha invalida";
    
    }
    else{   // email e senha corretos
            session_start();
            $_SESSION['nome']= $logins['Nome'];
            $_SESSION['cpf'] = $logins ['CPF'];
            $_SESSION['senha'] = $logins['senha'];
            header("Location:index.php");
          }

?>

		
</body>
<?php
include "incluir/rodapeAdm.php";
?>
</html>