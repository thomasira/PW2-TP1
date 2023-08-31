<?php

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

if (isset($_POST) && $_POST != null) {
    $manager = new Manager();
    $manager->createStamp($_POST);
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