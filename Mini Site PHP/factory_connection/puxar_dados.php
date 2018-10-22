<?php
    include_once("conexao.php");
    $sql = "select paragrafo from conteudo";
    $resul = mysqli_query($con, $sql);
    $paragrafo = "";

    if(mysqli_num_rows($resul) > 0){
        while($row = mysqli_fetch_assoc($resul)) {
            $paragrafo = $row["paragrafo"];
        }
    }
    mysqli_close($con);
?>