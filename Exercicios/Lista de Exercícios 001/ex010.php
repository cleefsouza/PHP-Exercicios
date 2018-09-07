<?php
    // Dados do usuário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    // Preparando mensagem
    $assunto = "Cadastro realizado com sucesso!";
    $corpo = "Olá $nome, seja bem vindo!<br><br>Dados do login:<br>Email: $email<br>Senha: $senha<br><br>Dados pessoais:<br>Nome: $nome<br>Telefone: $telefone<br>CPF: $cpf<br>RG: $rg<br><br>Obrigado por se cadastrar!";
    
    // Imprimindo valores
    echo $assunto."<br>".$corpo;

    // Enviando e-mail
    if(mail($senha,$assunto,$corpo)){
        echo "Mensagem enviada com sucesso.";
    }else{
        echo "Erro no envio da mensagem.";
    }
?>