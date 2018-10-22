<?php
    include("factory_connection/puxar_dados.php");

    echo '<section id="sobre" class="flex-container sobre">
    <div class="sobre-info">'.$paragrafo.'
    </div>
    <div class="sobre-img">
    <img src="img/rosa-lutero.png" alt="Rosa de Lutero" title="Rosa de Lutero">
    <figcaption style="text-align: center; margin-top: 2vh;">Rosa de Lutero</figcaption>
    </div>
    </section>

    <section id="solas" class="flex-container solas">
    <div class="flex-container solas-elementos">
    <div class="solas-img">
    <img src="img/sola-scriptura.png" alt="Sola Scriptura">
    </div>
    <div class="solas-img">
    <img src="img/solus-christus.png" alt="Solus Christus">
    </div>
    <div class="solas-img">
    <img src="img/sola-gratia.png" alt="Sola Gratia">
    </div>
    <div class="solas-img">
    <img src="img/sola-fide.png" alt="Sola Fide">
    </div>
    <div class="solas-img">
    <img src="img/soli-deo-gloria.png" alt="Soli Deo Gloria">
    </div>
    </div>
    </section>

    <section id="formulario" class="flex-container formulario">
    <p>
    AVALIE-NOS
    <br>deixe um comentário!
    </p>

    <form class="flex-container" action="factory_connection/gravar_dados.php" method="POST">
    <div class="flex-container dados-pessoais">
    <input type="text" name="fnome" placeholder="Digite seu nome aqui">
    <input type="email" name="femail" placeholder="Digite seu e-mail aqui">
    </div>
    <textarea name="fcomentario" rows="10" cols="50" placeholder="Deixe uma mensagem..."></textarea>
    <button type="submit" onclick="alert("Mensagem enviada com sucesso !!!\nA equipe do 5 Solas agradece sua avaliação.")">Enviar</button>
    </form>
    </section>';
?>