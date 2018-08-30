<?php 
    // Recebendo o identificador do arquivo no modo read
    $arquivo = fopen("arquivos.txt","r");

    if($arquivo){
        echo "O script abriu o arquivo:<br><br>";

        // Enquanto o fim do arquivo não for atingido
        while(!feof($arquivo)){
            // Lê uma linha do arquivo
            $linha = fgets($arquivo);

            echo $linha."<br>";
        }

        fclose($arquivo); // Fecha o arquivo

    }else{
        echo "Erro ao abrir o arquivo!";
    }
?>