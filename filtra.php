<?php
session_start();
 include("conexao.php");
if(empty($_POST['data1']) || empty($_POST['data2'])){
    header('Location: user.php');
    exit();
}

$data1 = mysqli_real_escape_string($conexao, $_POST['data1']);
$data2 = mysqli_real_escape_string($conexao, $_POST['data2']);

$_SESSION['data1'] = $data1;
$_SESSION['data2'] = $data2;




?>

<!DOCTYPE html>
<html lang= "pt-BR" style="padding:0px">
    <head>
        <meta charset ="utf-8" author ="Thiago Borges" name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport">
        <title>Formulário responsivo</title>
        <link href="style2.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans|Montserrat">
    </head>
    <style>
        #session_1 {
            margin-left: 370px;
        }
        
    </style>
    
    <body>
    <header>
         
        <div id="navega">
        <tr><td><button type="submit" class="link" ><a id="link" href="logout.php" style="color:black">Logout</button></td></tr>
         <tr><td><button type="submit" ><a href="user.php" class = "link">Voltar</a></button></td> </tr>
        </div>
        
        <img src="UPE.png">
    </header>
        <div id="session_1">
            <?php
                
                include("conexao.php");
                #criando um ambiente personalizado para cada usuário
                $name = $_SESSION['nome'];
                $query = "select id_chamado, data, setor, obs from {$name} where data between '{$data1}' and '{$data2}'" ;
                $sql = mysqli_query($conexao, $query);
                $count = mysqli_num_rows($sql);
                echo "<table type='text'>";
                $exibe = mysqli_fetch_assoc($sql);
                    
                    echo "<tr>";
                        echo "<th>Código do chamado</th>";
                        echo "<th>Data de fechamento</th>";
                        echo "<th>Setor</th>";
                        echo "<th>Obs:</th>";
                            
                    echo "</tr>";
                    if($count == 0){
                        echo "<h3>Não há chamados</h3><br>";
                    }
                    else {
                        #exibir primeira linha dos chamados
                        echo "<td>" .$exibe["id_chamado"]."</td>";
                            echo "<td>" .$exibe["data"]."</td>";
                            echo "<td>" .$exibe["setor"]."</td>";
                            echo "<td>" .$exibe["obs"]."</td>";
                   #resto das linhas
                    while($exibe=mysqli_fetch_assoc($sql)){
                        echo "<tr>";
                            echo "<td>" .$exibe["id_chamado"]."</td>";
                            echo "<td>" .$exibe["data"]."</td>";
                            echo "<td>" .$exibe["setor"]."</td>";
                            echo "<td>" .$exibe["obs"]."</td>";
                        echo "</tr>";
                    }
                    
                }         
                echo "</table>";
                echo "<h3>Total de chamados: ".$count."</h3>";
            
            ?>
            
        
        </div>
        
       

        
    </body>
 