<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";
if (!isset($_POST) || $_POST == null) {
    header("location: index.php");
}

$manager = new Manager();
$id = $manager->update($_POST);
header("location: stamp-show.php?id=$id")
?>