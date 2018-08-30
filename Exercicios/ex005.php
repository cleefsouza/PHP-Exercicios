<?php
    $nome = $_POST['nome'];
    $disciplina = $_POST['disciplina'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    function calcularMedia(){
        global $nota1;
        global $nota2;
        global $nota3;
        return ($nota1+$nota2+$nota3)/3;
    }

    echo "Nome: $nome.<br>Disciplina: $disciplina.<br>Média: ",calcularMedia();
?>