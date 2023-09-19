<?php 

 require_once 'funcoes.php';
 $u=new usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
    <div id="formulario">
    <h1>Acessar o sistema</h1>
    <form  method="POST" action="#">
    <input type="email" name="email" placeholder="Nome de usuário">
    <input type="password" name="senha" placeholder="Senha">
    <center>
    <input type="submit" value="Acessar" name="login">
    <a href="cadastrar.php">Criar nova conta aqui!</a>
    
    </form>
    </div>
    </center>
    <?php 
    if (isset($_POST['email']))
    {
 
      $email =  ($_POST['email']);
      $senha =  ($_POST['senha']);
    
     

      if(!empty($email )&& !empty($senha))
    {    
       

        $u->conectar('root',"");
        if($u->logar($email,$senha))
        {
        
           header('location:sistema.php');     
        }
        else{
            echo 'Erro de email ou senha ';
        }
    }
    else{
        echo'Prencher todos os campos';
    }
    }
    ?>
</body>
