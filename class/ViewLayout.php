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
                <style>
                    <?php 
                    include "./style/layout/navigation.css";
                    include "./style/layout/structure.css";
                    include "./style/config/general.css";
                    include "./style/config/school-header.css";
                    include "./style/config/school-footer.css";
                    include "./style/class/card-stamp.css";
                    include "./style/class/flow-stamps.css";
                    include "./style/class/file-stamp.css";

                     ?>
            </style>
                
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
            <a href="./stamp-index.php">STAMPS</a>
            <a href="./user-index.php">USERS</a>
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