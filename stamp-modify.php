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
$objStamps = $manager->getObjStamps(["target" => "stamp.id", "value" => $id]);
$data = $manager->getStampFormData();
$objStamps[0]->stampModifyForm($data);
ViewLayout::footer();
?>