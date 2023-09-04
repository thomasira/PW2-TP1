<?php

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("user-create");
ViewLayout::navigation();
User::userCreateForm();
ViewLayout::footer(); 
?>