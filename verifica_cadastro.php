<?php
session_start();
include('conexao.php');
$usuario = $_SESSION['nome'];
$data = mysqli_real_escape_string($conexao, $_POST['data']);
$setor = mysqli_real_escape_string($conexao, $_POST['setor']);
$obs = mysqli_real_escape_string($conexao, $_POST['obs']);


$query = "insert into {$usuario} (data, setor, obs) values ('{$data}', '{$setor}', '{$obs}') ";


if(empty($_POST['data']) || empty($_POST['setor']) || empty($_POST['obs'])){
    header('Location: cadastrar.php');
    exit();
}else 
{
    $result = mysqli_query($conexao, $query);
    header('Location: user.php');
    exit();
    
}



?>