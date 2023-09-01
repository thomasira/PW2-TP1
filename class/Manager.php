<?php
require "./crud/Crud.php";
require "./class/Stamp.php";
require "./class/User.php";

class Manager {
    private $stampReq = [ 
            "table" => "stamp",
            "tablesMerge" => [
                "aspect",
                "category"
            ],
            "targets" => [
                "stamp.id",
                "stamp.name as name",
                "stamp.year",
                "stamp.origin",
                "stamp.description",
                "aspect.name as aspect", 
                "category.name as category"
            ]
    ];
    private $crud;

    public function __construct() {
        $this->crud = new Crud("stamp");
    }

    public function getStampNames() {
        return $this->crud->readStd($this->stampReq["table"], ["stamp.name", "stamp.id"]);
    }

    public function getObjStamps() {
        $objStamps = [];
        $stamps = $this->crud->readStd($this->stampReq["table"], $this->stampReq["targets"], $this->stampReq["tablesMerge"]);
        foreach ($stamps as $stamp) $objStamps[] = new Stamp($stamp);
        return $objStamps;
    }

    public function getObjStamp($id) {
        $where = [
            "target" => "stamp.id",
            "value" => $id
        ];
        $stamps = $this->crud->readStd($this->stampReq["table"], $this->stampReq["targets"], $this->stampReq["tablesMerge"], $where);
        foreach ($stamps as $stamp) $objStamp = new Stamp($stamp);
        return $objStamp;
    }

    public function getUserNames() {
        return $this->crud->readStd("user", ["user.name", "user.id"]);
    }

/*     public function getObjUsers() {
        $objUsers = [];
        $users = $this->crud->readStd("user");
        foreach ($users as $user) {
            $objStamps = [];
            $userId = $user["id"];
            $userStamps = $this->crud->readUserStamp($this->stampReq["targets"], ["target" => "user.id", "value" => $userId]);
            foreach ($userStamps as $userStamp) $objStamps[] = ["stamp" => new Stamp($userStamp), "qty" => $userStamp["qty"]];
            $objUsers[] = new User($user, $objStamps);
        }
        return $objUsers;
    } */

    public function getObjUser($id) {
        $stampsTargets = [
            "stamp.id",
            "stamp.name as name",
            "stamp.year",
            "stamp.origin",
            "stamp.description",
            "aspect.name as aspect", 
            "category.name as category",
            "user_stamp.qty"
        ];
        $where = [
            "target" => "user.id",
            "value" => $id
        ];
        $users = $this->crud->readStd("user", "*", "", $where);
        foreach ($users as $user) {
            $objStamps = [];
            $userId = $user["id"];
            $userStamps = $this->crud->readUserStamp($stampsTargets, $where);
            foreach ($userStamps as $userStamp) $objStamps[] = ["stamp" => new Stamp($userStamp), "qty" => $userStamp["qty"]];
            $objUser = new User($user, $objStamps);
        } 
        return $objUser;
    }

    public function getCategories() {
        return $this->crud->readStd("category");
    }

    public function getAspects() {
        return $this->crud->readStd("aspect");
    }

    public function getUserStamps() {
        return $this->crud->readUserStamp();
    }

    public function getAllShort() {
        $data["stamps"] = $this->getStampNames();
        $data["users"] = $this->getUserNames();
        $data["categories"] = $this->getCategories();
        $data["aspects"] = $this->getAspects();
        return $data;
    }

    public function createUser($data) {
        $this->crud->create("user", $data);
    }

    public function createCategory($data) {
        $this->crud->create("category", $data);
    }

    public function createStamp($data) {
        $this->crud->create("stamp", $data);
    }

    public function createAspect($data) {
        $this->crud->create("aspect", $data);
    }

}