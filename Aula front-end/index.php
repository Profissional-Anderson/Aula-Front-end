<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    
</head>
<body>
  
  <div id="corpo-form">
  <fieldset id="borda1">
  <h1>Entrar</h1>
    <form method="POST">  

       <input type="email" placeholder="Usuário" name="email">
       <input type="password" placeholder="Senha" name="senha">
       <input type="submit" name="acessar" value="Acessar!" id="botao">
       <a href="cadastro.php">Ainda não é escrito?<strong> Cadastre-se</strong></a>

     </form>
	 </fieldset>
     </div>

     <?php
        if(isset($_POST['acessar'])){
            $email = ($_POST['email']);
            $senha = ($_POST['senha']);
            //verificar se esta preenchidas
            if(!empty($email) && !empty($senha)){
              //conectar ao banco
              $u->conectar("projeto_login", "localhost", "root", "");
              if($u->msgErro == ""){
                if ($u->logar($email,$senha)){
                  //entra na area privada
                  header("location: areaPrivada.php");
                }else{
                  echo "Email e/ou senha incorretos";
                }

              }else{
                echo "ERRO: ".$u->msgErro;
              }

            }else{
              echo "Preencha todos os campos!";
            }
        }
    ?>
 
    
</body>
</html>