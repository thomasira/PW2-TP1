<?php
require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";
if (isset($_POST["userId"]) && $_POST["userId"] != null) $id = $_POST["userId"];
ViewLayout::schoolheader("stamp-create");
ViewLayout::navigation();
$manager = new Manager();
$data = $manager->getStampFormData();
if (isset($id)) $data["isUser"] = $id;
Stamp::stampCreateForm($data);
ViewLayout::footer(); 
?>