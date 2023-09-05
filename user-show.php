<?php
if (!isset($_GET["id"]) || $_GET["id"] == null) {
    header("location:index.php");
    exit;
} else $id = $_GET["id"];

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("user-show");
ViewLayout::navigation();
$manager = new Manager();
$objUsers = $manager->getObjUsers(["target" => "user.id", "value" => $id]);
$objUsers[0]->userShow();
ViewLayout::footer();
?>