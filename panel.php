<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();
?>

<?php 
$manager = new Manager();
/* ViewContent::panel();
ViewLayout::footer();  */
?>