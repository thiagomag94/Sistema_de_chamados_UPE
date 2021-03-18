<?php
session_start();
include('conexao.php');


$usuario = $_SESSION['nome'];
$id = mysqli_real_escape_string($conexao, $_POST['id']);


$query = "delete from {$usuario} where id_chamado= {$id}";
$result = mysqli_query($conexao, $query);

if ($result == True) {
    header('Location: user.php');
}




?>