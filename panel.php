<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("panel");
ViewLayout::navigation();
$manager = new Manager();
$data = $manager->getAllShort();
Panel::panelIndex($data);
ViewLayout::footer(); 
?>