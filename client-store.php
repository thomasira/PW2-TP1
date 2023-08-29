<?php
require_once("./crud/class/Crud.php");

$crud = new Crud;
$create = $crud->create("client", $_POST);
header("location: client-show.php?id=$create");

?>