<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();

$manager = new Manager();
$data = $manager->getAll();

ViewContent::panel($data);
ViewLayout::footer(); 
?>