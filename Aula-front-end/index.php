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
                  echo  "<script>alert('Conectado');location.href='areaPrivada.php';</script>";
                 
                  
                }else{
                  echo "<div class='mensagem-erro'>
                        <fieldset id='borda3'>
                        <p id='p1'>Email e/ou senha incorretos</p>
                        <hr>
                        </fieldset>
                        </div>";
                }

              }else{
                echo "ERRO: ".$u->msgErro;
              }

            }else{
              echo "<div class='mensagem-erro'>
                    <fieldset id='borda3'>
                    <p id='p1'>Preencha todos os campos!</p>
                    <hr>
                    </fieldset>
                    </div>";
            }
        }
    ?>
 
    
</body>
</html>