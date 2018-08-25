<?php

    $bmaior = $_POST['bmaior'];
    $bmenor = $_POST['bmenor'];
    $altura = $_POST['altura'];
    $area = (($bmaior+$bmenor)/2)*$altura;

    echo "Área do Trapézio: $area cm².";
?>