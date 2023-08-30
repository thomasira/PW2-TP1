<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

print_r($_GET);
ViewLayout::schoolHeader("home");
ViewLayout::navigation();

$manager = new Manager();
$manager->setStamps();
$objStamps = $manager->getStamps();

ViewContent::home($objStamps);
ViewLayout::footer(); 
?>