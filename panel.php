<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolheader("home");
ViewLayout::navigation();
?>

<?php 
$manager = new Manager();
ViewContent::panel();
/* $objStamps = $manager->getAllStamps();
foreach ($objStamps as $objStamp) $objStamp->inject(); */
?>



<?php 
ViewLayout::footer(); 
?>