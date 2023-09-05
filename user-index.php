<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("user-index");
ViewLayout::navigation();
$manager = new Manager();
$users = $manager->getObjUsers();
User::userIndex($users);
ViewLayout::footer(); 
?>