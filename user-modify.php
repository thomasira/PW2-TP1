<?php
if (!isset($_POST["id"]) || $_POST["id"] == null) {
    header("location: index.php");
    exit;
} else $id = $_POST["id"];

require "./class/ViewLayout.php";
require "./class/ViewContent.php";
require "./class/Manager.php";

ViewLayout::schoolHeader("user-modify");
ViewLayout::navigation();
$manager = new Manager();
$objUsers = $manager->getObjUsers(["target" => "pw2tp1_user.id", "value" => $id]);
$objUsers[0]->userModifyForm();
ViewLayout::footer();
?>
