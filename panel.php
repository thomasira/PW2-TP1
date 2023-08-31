<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();

$manager = new Manager();
$stamps = $manager->getAllStamps();
$users = $manager->getAllUsers();

ViewContent::panel($users, $stamps);
ViewLayout::footer(); 
?>