<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("category-create");
ViewLayout::navigation();
ViewContent::categoryForm();
ViewLayout::footer(); 
?>