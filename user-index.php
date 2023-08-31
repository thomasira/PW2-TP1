<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("home");
ViewLayout::navigation();
$manager = new Manager();
$objUsers = $manager->getUsers();

ViewContent::home($objStamps);
ViewLayout::footer(); 
?>