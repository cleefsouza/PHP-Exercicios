<?php
    # declarando variaveis simples
    $nome = "Cleef";
    $sobrenome = "Souza";
    $idade = 23;
    $profissao = "Estagiario";

    echo "Olá $profissao $nome $sobrenome. <br>";
    echo "Você possui atualmente $idade anos. <br>";

    # declarando variavel variante, referencia uma variavel ao valor da outra
    $maquina = "Notebook";
    $$maquina = "Samsung";

    echo "Seu $maquina é da marca $Notebook. <br>";

    # acessando o mesmo endereço na memória
    $souA = "A";
    $souB = &$souA;

    echo "Sou A: $souA. <br>";
    echo "Sou B: $souB";

?>