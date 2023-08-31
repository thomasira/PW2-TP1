<?php
if (!isset($_GET["id"]) || $_GET["id"] == null) {
    header("location:index.php");
    exit;
} else $id = $_GET["id"];

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("home");
ViewLayout::navigation();

$manager = new Manager();
$objUser = $manager->getObjUser($id);

ViewContent::userShow($objUser);
ViewLayout::footer();
?>