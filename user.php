<?php
include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang= "pt-BR" style="padding:0px">
    <head>
        <meta charset ="utf-8" author ="Thiago Borges" name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport">
        <title>NCTI-CHAMADOS</title>
        <link href="style2.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans|Montserrat">
    </head>
   
    <body>
     
        
        <header>
        
            
           
            <div id="navega">
            <tr><td><button type="submit" class="link" ><a id="link" href="logout.php" style="color:black">Logout</button></td></tr>
             <tr><td><button type="submit" ><a href="cadastrar.php" class = "link">Inserir Chamado</a></button></td> </tr>
            </div>
            
            <img src="UPE.png">
        </header>
        
     
        <div id="menus">
            <ul>
            <form action="filtra.php" id="form-data" method="post" tabindex="2"> 
                    <label ><b>Filtre entre datas</b></label><br><br>
                    <input type="date" class="inserir-data" name="data1" placeholder="Data 1"  />  <br><br>
                    <input type="date" class="inserir-data" name="data2" placeholder="Data 2"  />  <br><br>
                    <button type="submit" class="link" >Filtrar</button> <br><br>
           </form>  
      
        <form action="deletar.php" class="deleta" method="post" tabindex="1"> 
                <label><b>Deletar registro</b></label><br><br>
                <input type="text" class="deleta" name="id" placeholder="código do chamado"  />  <br><br>
                <button type="submit" >Deletar</button>
            </form>
        </ul>
       
       </div>
        <div id="session_1">
            <?php
                
                include("conexao.php");
                #criando um ambiente personalizado para cada usuário
                $name = $_SESSION['nome'];
                $query = "select id_chamado, data, setor, obs from {$name}";
                $sql = mysqli_query($conexao, $query);
                $count = mysqli_num_rows($sql);
                echo "<table id='tabela-banco'>";
                $exibe = mysqli_fetch_assoc($sql);
                    echo "<caption>SUPORTE - NCTI - CHAMADOS ATENDIDOS</caption>";
                    echo "<thead>";
                        echo "<th>Código do chamado</th>";
                        echo "<th>Data de fechamento</th>";
                        echo "<th>Setor</th>";
                        echo "<th>Obs:</th>";
                            
                    echo "</thead>";
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
                echo "<h3 id='tabela'>Total de chamados: ".$count."</h3>";
            
            ?>
        </div>
        
        
        

        
        
        
    </body>