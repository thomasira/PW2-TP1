<?php
require "../class/Manager.php";
require "../class/ViewLayout.php";
require "../class/Panel.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();

$manager = new Manager();
$data = getAllShort();

Panel::panelIndex($data);
ViewLayout::footer(); 
?>