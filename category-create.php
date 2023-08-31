<?php

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

if (isset($_POST) && $_POST != null) {
    $manager = new Manager();
    $manager->createCategory($_POST);
    header("location: ./panel.php?msg=4");
}
ViewLayout::schoolheader("category-create");
ViewLayout::navigation();
ViewContent::categoryForm();
ViewLayout::footer(); 
?>