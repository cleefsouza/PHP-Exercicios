<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
            include_once("pages/head.php");
        ?>
    </head>
    <body>
        <?php
            include_once("pages/topo.php");
            include_once("pages/menu.php");      
            if(empty($_SERVER["QUERY_STRING"])){
                $var = "pages/main.php";
                include_once("$var");
            }else{
                $pg = $_GET['pg'];
                include_once("$pg.php");
            }
            include_once("pages/footer.php");
        ?>
    </body>
</html>