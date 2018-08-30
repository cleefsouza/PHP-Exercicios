<?php
    // Array de nomes
    $nomes[0] = $_POST['nome1'];
    $nomes[1] = $_POST['nome2'];
    $nomes[2] = $_POST['nome3'];
    $nomes[3] = $_POST['nome4'];
    $nomes[4] = $_POST['nome5'];

    // Criando arquivo de texto
    $fp1 = fopen("ex007.txt","a");

    // Adicionando nomes ao arquivo
    for($i = 0; $i<=4; $i++){
        fwrite($fp1, "$nomes[$i] <br>");
    }

    // Encerrando arquivo
    fclose($fp1);

    // Abrindo o arquivo no modo leitura
    $fp2 = fopen("ex007.txt", "r");

    echo "<h2>Lista de Nomes</h2>";
    // Lendo linha por linha do arquivo
    while(!feof($fp2)){
        echo fgets($fp2);
    }

    // Encerrando arquivo
    fclose($fp2);
?>