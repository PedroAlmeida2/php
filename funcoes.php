<?php 

class usuario{
private $pdo;
function conectar($user, $pass){
global $pdo;
$host = "localhost";
//$user = "root";
//$pass = "";
$dbname = "atividade";
$pdo = new PDO("mysql:host=$host;dbname=".$dbname,$user,$pass);

//$pdo = new PDO("mysql:dbname=".$nome."host=".$host,$conta,$senha);
}

function cadastrar($name,$email,$senha){
    global $pdo;
    $sql = $pdo ->prepare ("select  id from conta where email = :e");
    $sql->bindValue(":e",$email);
    $sql->execute();
    if($sql->rowCount()>0)
    {
        return false;
    }
    else
    {
     $sql=$pdo->prepare("insert into conta(nome,email,senha)values(:n,:e,:s)"); 
     $sql->bindValue(":n",$name);
     $sql->bindValue(":e",$email);
     $sql->bindValue(":s",md5(($senha)));
     $sql->execute();
     return true;
    }

}public function logar($email,$senha){
    global $pdo;
    $sql = $pdo->prepare("select id from conta where email=:e and senha=:s");
    $sql->bindValue(":e",($email));
    $sql->bindValue(":s",md5($senha));
    $sql->execute();
    if($sql->rowCount()>0){
        $dado=$sql->fetch();
        session_start();
        $_SESSION['id']=$dado['id'];

        return true;
    }
    else{
        return false;
    }
}
}
?>