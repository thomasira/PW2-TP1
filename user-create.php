<?php

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

if (isset($_POST) && $_POST != null) {
    $manager = new Manager();
    $manager->createUser($_POST);
    header("location: ./panel.php?msg=1");
}

ViewLayout::schoolheader("home");
ViewLayout::navigation();
ViewContent::userForm();
ViewLayout::footer(); 
?>