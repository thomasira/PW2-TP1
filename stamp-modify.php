<?php
if (!isset($_POST["id"]) || $_POST["id"] == null) {
    header("location: index.php");
    exit;
} else $id = $_POST["id"];

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("stamp-modify");
ViewLayout::navigation();

$manager = new Manager();
$objStamp = $manager->getObjStamp($id);
$data["categories"] = $manager->getCategories();
$data["aspects"] = $manager->getAspects();
ViewContent::stampModify($objStamp, $data);
ViewLayout::footer();
?>