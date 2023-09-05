<?php
require "./class/Manager.php";

if (isset($_POST) && $_POST != null){
    $manager = new Manager();
    $manager->delete($_POST);
} 
header("location:panel.php");
