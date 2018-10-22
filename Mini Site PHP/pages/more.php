<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
            include_once("head_more.php");
        ?>
    </head>
    <body>
        <?php
            include_once("topo.php");
            include_once("menu_more.php");      
            if(empty($_SERVER["QUERY_STRING"])){
                $var = "conteudo_more.php";
                include_once("$var");
            }else{
                $pg = $_GET['pg'];
                include_once("$pg.php");
            }  
            include_once("footer.php");
        ?>
    </body>
</html>