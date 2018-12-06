<?php 
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db($link, "cinelist");

//Verificar conexão
if ($link == false){
    die("Erro: Não pôde conectar " . mysqli_connect_error());
}


?>