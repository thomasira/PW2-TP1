<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("stamp-index");
ViewLayout::navigation();
$manager = new Manager();
$objStamps = $manager->getObjStamps();
Stamp::stampIndex($objStamps);
ViewLayout::footer(); 
?>