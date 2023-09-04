<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("home");
ViewLayout::navigation();
$manager = new Manager();
$users = $manager->getObjUsers();

ViewContent::userIndex($users);
ViewLayout::footer(); 
?>