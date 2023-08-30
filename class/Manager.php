<?php
require "./crud/Crud.php";
require "./class/Stamp.php";

class Manager {
    private $stamps;
    private $users;

    public function setStamps() {
        $objStamps = [];
        $tableOg = "stamp";
        $tablesMg = [
            "aspect",
            "category"
        ];
        $targets = [
            "stamp.id",
            "stamp.name as name",
            "stamp.year",
            "stamp.origin",
            "stamp.description",
            "aspect.name as aspect", 
            "category.name as category"
        ];
        $crud = new Crud("stamp");
        $stamps = $crud->readStamps($tableOg, $targets, $tablesMg);
        foreach ($stamps as $stamp) $objStamps[] = new Stamp($stamp);
        $this->stamps = $objStamps;
    }

    public function getStamps() {
        return $this->stamps;
    }
}