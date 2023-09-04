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
$objStamps = $manager->getObjStamps(["target" => "id", "value" => $id]);
$data = $manager->getStampFormData();
$objStamp = new Stamp($objStamps[0]);
Stamp::stampModify($data);
ViewLayout::footer();
?>