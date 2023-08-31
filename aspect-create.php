<?php

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

if (isset($_POST) && $_POST != null) {
    $manager = new Manager();
    $manager->createAspect($_POST);
    header("location: ./panel.php?msg=3");
}
ViewLayout::schoolheader("aspect-create");
ViewLayout::navigation();
ViewContent::AspectForm();
ViewLayout::footer(); 
?>