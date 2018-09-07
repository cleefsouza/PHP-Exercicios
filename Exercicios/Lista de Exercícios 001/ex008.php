<?php
    $anonasc = $_POST['anonasc'];
    $anoatual = $_POST['anoatual'];

    $idade = $anoatual-$anonasc;
    echo "Idade atual: ".$idade." anos.";
?>