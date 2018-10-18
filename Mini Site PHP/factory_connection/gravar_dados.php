<?php
    include("conexao.php");

    $fnome = $_POST["fnome"];
    $femail = $_POST["femail"];
    $fcomentario = $_POST["fcomentario"];

    if ($fnome==""){
        $fnome = "_anônimo";
    }
    if($femail==""){
        $femail = "_anônimo@gmail.com";
    }
    if($fcomentario==""){
        $fcomentario = "Nenhum comentário adicionado!";
    }

    mysqli_query($con, "insert into avaliacao (nome, email, comentario) values ('$fnome','$femail','$fcomentario')");
?>