<?php

	# metodo $_POST envia as informações de forma invisivel ao usuário
	# metodo $_GET envia as informações de forma visivel ao usuário (na barra de endereços do navegador)
	# função $_REQUEST recebe os valores enviados não importa o metodo (POST ou GET) ele reconhece automaticamente
	
	# variaveis recebendo valores do formulario através do metodo $_POST
	$nome = $_POST['nome'];
	$idade = $_POST['idade'];

	echo "Nome do Usuário: $nome. <br>";
	echo "Idade do Usiário: $idade.";
?>