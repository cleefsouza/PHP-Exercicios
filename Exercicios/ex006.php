<?php
    /*
    6) Crie um script que gere um arquivo .txt, abra-o e guardar 3 frases nele.
    Depois crie um script que imprima o conteúdo gravado no arquivo.
    */
    $frase1 = "Meu nome é Cleef Souza.<br>";
    $frase2 = "Estudo atualmente na UNIPÊ e ";
    $frase3 = "estou me graduando em Sistemas para Internet.";

    // Se não houver o arquivo ele cria um novo
    $fp1 = fopen("ex006.txt","a");

    // Escrevendo as 3 frases no arquivo
    fwrite($fp1,$frase1);
    fwrite($fp1,$frase2);
    fwrite($fp1,$frase3);
    
    // Fechando o arquivo
    fclose($fp1);

    // Recebendo o arquivo no modo leitura
    $fp2 = fopen("ex006.txt","r");

    // Lendo o arquivo
    while(!feof($fp2)){
        echo fgets($fp2);
    }

    // Fechando o arquivo
    fclose($fp2);
?>