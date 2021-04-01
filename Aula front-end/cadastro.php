<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastramento</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
	
		<div id="corpo-form-cad">
			<fieldset id="borda1">
			<b><h1>Cadastrar</h1></b>

			<form method="POST"> 
				<input type="text" name="nome" placeholder="Nome completo" maxlength="30">
				<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
				<input type="email" name="email" placeholder="Usuário" maxlength="40">
				<input type="password" name="senha" placeholder="Senha" maxlength="15">
				<input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
				<input type="submit" name ="enviar" value= "Enviar" id="botao">

			<form>
			</fieldset>
		</div>
        <?php
        if(isset($_POST['enviar'])){
            $nome = ($_POST['nome']);
            $telefone = ($_POST['telefone']);
            $email = ($_POST['email']);
            $senha = ($_POST['senha']);
            $confSenha = ($_POST['confSenha']);

            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha)){
                $u->conectar("projeto_login", "localhost", "root", "");
               

                if($u->msgErro == ""){
                    if($senha == $confSenha){
                        if($u->cadastrar($nome, $telefone, $email, $senha)){

                        
                        ?>

                        <div id="msg-sucesso">
                        <fieldset id="borda2">
                          <p>Usuario cadastrado com sucesso!<p>
                        <hr>
                        </fieldset>
                        </div>

                        <?php
                        }else{
                            echo "Email já Cadastrado!";
                        }
                    }else{
                        ?>
                        <div class="mensagem-erro">
                        <fieldset id="borda4">
                       <p id="p2">Senha e Confirmar senha não correspondem!</p>
                       <hr>
                       </fieldset>
                    </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="mensagem-erro">
                    echo "Erro: ".$u->msgErro;                    
                    </div>                 
                    <?php

                }
            }else{
                ?>
                
                <div class="mensagem-erro">
                <fieldset id="borda3">
                 <p id="p1">Preencha todos os campos!</p>
                 <hr>
                 </fieldset>
                 </div>
            <?php
                
                

            }
        }
    ?>
</body>
</html>