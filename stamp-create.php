<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();

$manager = new Manager();
$data = $manager->getStampFormData();

Stamp::stampCreateForm($data);
ViewLayout::footer(); 
?>