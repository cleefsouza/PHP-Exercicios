<?php
    $investimento = $_POST["investimento"];
    $valor = $_POST["valor"];

    function recalcularValor($inv, $aux){
        if($inv == "1"){
            $total = $aux+($aux*0.3);
            echo "Tipo do investimento: Poupança (3%).<br>Valor: R$ $aux.<br>Valor Corrigido: R$ $total";
        }else{
            $total = $aux+($aux*0.4);
            echo "Tipo do investimento: Fundos de Renda Fixa (4%).<br>Valor: R$ $aux.<br>Valor Corrigido: R$ $total";
        }
    }

    echo recalcularValor($investimento, $valor);
?>