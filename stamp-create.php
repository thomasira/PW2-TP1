<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("stamp-create");
ViewLayout::navigation();
$manager = new Manager();
$data = $manager->getStampFormData();
Stamp::stampCreateForm($data);
ViewLayout::footer(); 
?>