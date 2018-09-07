<?php

    /*Programação Dinâmica para Web</h3>
    9) Faça um script PHP que receba os dados armazenados em variáveis chamadas nome, telefone e e-mail. Após isso, deve ser impresso na tela os valores das variáveis declaradas em um único comando echo;*/

    $nomes = ["Java 9","JavaScript","HTML 5","CSS 3","Python 3","PHP 7"];
    $telefones = ["0000-0000","1111-1111","2222-2222","3333-3333","4444-4444","5555-5555"];
    $emails = ["java@gmail.com","javascript@gmail.com","html5@gmail.com","css3@gmail.com","python@gmail.com","php@gmail.com"];
    
    for($i = 0; $i < 5; $i++){
        echo "Lista ".($i+1).": <br>Nome: ".$nomes[$i]." / E-mail: ".$emails[$i]." / Telefones: ".$telefones[$i]."<br><br>";
    }
?>