<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();

$manager = new Manager();
$data["stamps"] = $manager->getStampNames();
$data["users"] = $manager->getUserNames();
$data["categories"] = $manager->getCategories();
$data["aspects"] = $manager->getAspects();
ViewContent::panel($data);
ViewLayout::footer(); 
?>