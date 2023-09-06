<?php
require "./class/Manager.php";
if (!isset($_POST) || $_POST == null) {
    header("location: index.php");
}
$manager = new Manager();
$manager->update($_POST);
header("location: panel.php")
?>