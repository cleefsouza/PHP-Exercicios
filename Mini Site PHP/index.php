<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>5 Solas</title>
    </head>
    <body>
        <?php
            include_once("pages/header.php");
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