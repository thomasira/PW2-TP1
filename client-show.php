<?php

if(!isset($_GET["id"]) || $_GET["id"] == null) {
    header("location: client-index.php");
    exit;
}

require_once("./crud/class/Crud.php");
include_once("./partial/head.php");


$id = $_GET["id"];

$crud = new Crud;
$selectId = $crud->readId("client", $id);

?>

<html>
    <body>
<?php include_once("./partial/header.php"); ?>
        <main>
            <h3>Read Id</h3>
<?php

foreach ($selectId as $row) {
    extract($row);
    include("./partial/clientShowREQ.php");
}

?>
        </main>
    </body>
</html>