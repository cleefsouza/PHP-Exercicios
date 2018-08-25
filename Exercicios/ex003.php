<?php

    $salario = $_POST['salario'];
    $vendas = $_POST['vendas'];

    $comissao = $vendas*0.04;
    $total_salario = $salario+$comissao;

    echo "Salário: $salario.<br>Comissão: $comissao.<br>Salário Final: $total_salario.";

?>