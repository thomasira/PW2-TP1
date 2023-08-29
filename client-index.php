<?php
require_once("./crud/class/Crud.php");
include_once("./partial/head.php");

$crud = new Crud;
$select = $crud->read("client", "name");

?>

<html>
    <body>
<?php include_once("./partial/header.php"); ?>
        <main>
            <h3>Read</h3>

<?php

foreach ($select as $row) {
    extract($row);
    include("./partial/clientShow.php");
}

?>
        </main>
    </body>
</html>