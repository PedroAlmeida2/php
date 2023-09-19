<?php
require_once 'funcoes.php';
$u = new usuario;


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
            <h1>Cadastrar</h1>
            <form method="POST">
                <input type="text" placeholder="Digite o seu nome" name="nome" maxlength="45">
                <input type="email" placeholder="Digite o seu Email" name="email" maxlength="45">
                <input type="password" placeholder="Digite uma senha" name="senha" maxlength="32">
                <input type="password" placeholder="Confirme a senha" name="confsenha" maxlength="32">
                <center>
                    <input type="submit" value="Cadastrar">
        </div>
        </form>
    </center>

    <?php
    if (isset($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email =  addslashes($_POST['email']);
        $senha =  addslashes($_POST['senha']);
        $confsenha =  addslashes($_POST['confsenha']);


        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confsenha)) {
            $u->conectar('root', "");
            if ($senha == $confsenha) {
                if ($u->cadastrar($nome, $email, $senha)) {
                    echo "Cadastraddo com sucesso!";
                } else {
                    echo "Usuário já cadastrado";
                }
            } else {
                //echo "<scriptalert('Senhas não correspondem');";
                //echo "javascript:window.location='cadastrar.php';</script>";

                echo 'Senhas não correspondem';
            }
        } else {
            // echo "<script type='javascript'>alert('Preencha todos os dados');";
            echo 'Preencha todos os dados';
        }
    }
    ?>