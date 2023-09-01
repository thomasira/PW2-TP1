<?php

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

if (isset($_POST) && $_POST != null && count($_POST) != 1) {
    $manager = new Manager();
    $manager->createStamp($_POST);
    if(isset($_POST["userId"])) {
        $manager->createUserStamp($_POST);
    }
    header("location: ./panel.php?msg=2");
}

ViewLayout::schoolheader("home");
ViewLayout::navigation();

$manager = new Manager();
$categories = $manager->getCategories();
$aspects = $manager->getAspects();

ViewContent::stampForm($categories, $aspects);
ViewLayout::footer(); 
?>