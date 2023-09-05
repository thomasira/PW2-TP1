<?php
require "./class/Manager.php";

if (isset($_POST) && $_POST != null){
    $manager = new Manager();
    $manager->create($_POST);
} 
header("location:panel.php");
