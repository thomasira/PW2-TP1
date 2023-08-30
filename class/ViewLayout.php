<?php

class ViewLayout {
    static public function schoolHeader($title) { 
?>
        <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="author" content="Thomas Aucoin-Lo">
                <link rel="stylesheet" href="./style/master.css">
                <title>PW2-TP1/<?= $title ?></title>
            </head>
            <body>
            <header>
                <h1>TP1</h1>
                <p>PW2 - OOP DB CRUD</p>
            </header>
<?php 
    } 


    static public function navigation() {
?>
            <nav>
                <a href=".">HOME</a>
                <a href="./panel.php">PANEL</a>
            </nav>
<?php
    }

    
    static public function footer() { 
?>
            <footer>
                <h4>29-08-2023</h4>
                <div>
                    <p>thomas Aucoin-lo</p>
                    <p>e2395387</p>
                </div>
            </footer>
        </body>
        </html>
<?php 
    }
}
?>