<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("aspect-create");
ViewLayout::navigation();
ViewContent::aspectForm();
ViewLayout::footer(); 
?>