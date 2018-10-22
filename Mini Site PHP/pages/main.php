<?php
    echo '<section id="sobre" class="flex-container sobre">
    <div class="sobre-info">
    <h2>Os Cinco Solas da Reforma</h2>
    <p>
    Antes da reforma protestante do século XVI, os ensinos, as ações e a postura da igreja Católica Romana, incomodavam os verdadeiros crentes, que procuravam pautar suas vidas nos ensinos das Escrituras Sagradas.
    </p>
    <p>
    Homens como Jerônimo Savanarola, João Huss e tantos outros foram mortos por defenderem seus ideais de conduta e fé.
    </p>
    <p>
    O monge agostiniano Martinho Lutero seguindo o mesmo ideal de lealdade às Escrituras. No dia 31 de outubro de 1517, Lutero afixa à porta da igreja do castelo de Witenberg, as suas 95 teses, cujo teor resume-se em que Cristo requer o arrependimento e a
    tristeza pelo pecado e não a penitência.
    </p>
    <p>
    Com o desenvolvimento dos estudos de Lutero e suas teses surgem os cinco pilares da reforma protestante que são também conhecidos como os cinco solas da reforma, são princípios fundamentais da reforma protestante sintetizando o credo dos teólogos protestantes.
    </p>
    <p>
    A palavra sola é uma palavra latina que significa "somente", esses pontos surgem com o propósito de se oporem ao pensamento, conduta e ensino da igreja romana da época.
    </p>
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
    <a href="pages/more.php">Saiba Mais</a>
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
    </section>

    <section id="avaliacao" class="flex-container avaliacao">
        <p>LISTAR AVALIAÇÕES</p>
    </section>';
?>