<?php
session_start();
include('conexao.php');

if(empty($_POST['nome']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['nome']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id_usuario, nome from login where nome = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['nome'] = $usuario;
    header('Location: user.php');
}
else {
    
    header('Location: index.php');
   
}




?>