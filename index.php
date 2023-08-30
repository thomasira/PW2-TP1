<?php
include "./partial/school-header.php";
include "./partial/navigation.php";
require "./lib/View.php";

require "./class/Stamp.php";
require "./crud/crud.php";

$crud = new Crud("stamp");
$stamps = $crud->read("stamp", ["stamp.id as stamp_id, stamp.name as stamp_name, condition.id as condition_id, stamp.name, condition.name"], ["condition", "category"]);


include "./partial/school-footer.php";