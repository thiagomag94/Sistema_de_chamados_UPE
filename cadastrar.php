
<?php
session_start();
include("conexao.php");

?>
    <html>
<head>
<meta  name="viewport" content="width=device-width, initial-scale=1">
<link  href="style2.css" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
 

  
   
}
h2 {
    text-align: center;
}
input[type=text], select, textarea, input[type=date] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  margin-left: 4.5vw
}



input[type=submit] {
  background-color: white;
  color: black;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 13.5vw;
 
  margin-top: 5px;
  
}
button {
  background-color: white;
  color: black;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;

  margin-top: 5px;
  
  
}
a {
    text-decoration: None;
    color:black;
}

input[type=submit]:hover {
  background-color: white;
  color: black;

}

.container {
  border-radius: 5px;
  background-color: linear-gradient(to top, rgb(26, 2, 111), rgb(14, 117, 252));
  padding: 5px;
  width: 40vw;
  margin-left: 395px;
  margin-top: 150px;
 


}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
label {
  text-align: center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<div class="container" id="registra">
  <form action="verifica_cadastro.php" method="post">
    <div class="row">

      <div class="col-75">
        
        <input type="date" id="data" name="data" placeholder="Data de fechamento do chamado.. ">
      </div>
    </div>
    <div class="row">
      <div class="col-75">
        <input type="text" id="setor" name="setor" placeholder="Setor ..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country"></label>
      </div>
     
    </div>
    <div class="row">
      
      <div class="col-75">
        <textarea id="subject" name="obs" placeholder="Observações.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Enviar"></input>
      <button ><a href="user.php">Voltar</a></button>
    </div>
    
</body>

  </form>
</div>
</html>







