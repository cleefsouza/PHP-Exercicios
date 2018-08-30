<?php
    // função que soma dois valores
    function somar($num1, $num2){
        return ($num1+$num2);
    }

    // função que calcula a média de dois valores
    function calcularMedia($num1, $num2){
        return (($num1+$num2)/2);
    }
    
    echo "A soma entre 5 e 6 é: ";
    echo somar(5,6);
    echo "<br>A média entre 9.0 e 6.5 é: ";
    echo calcularMedia(9,6.5);
?>