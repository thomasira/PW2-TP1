<?php
if (!isset($_GET["id"]) || $_GET["id"] == null) {
    header("location:index.php");
    exit;
} else $id = $_GET["id"];

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("stamp-show");
ViewLayout::navigation();
$manager = new Manager();
$objStamps = $manager->getObjStamps(["target" => "pw2tp1_stamp.id", "value" => $id]);
$objStamps[0]->stampShow();
ViewLayout::footer();
?>