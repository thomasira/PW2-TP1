<?php
require "./crud/Crud.php";
require "./class/Stamp.php";
require "./class/User.php";

class Manager {
    private $crud;

    public function __construct() {
        $this->crud = new Crud("stamp");
    }

    public function getStampNames() {
        return $this->crud->read($this->stampReq["table"], ["stamp.name", "stamp.id"]);
    }

    public function getObjStamps($where = null) {
        $objStamps = [];
        $targets = [
            "stamp.*",
            "aspect.aspect"
        ];
        $tablesMrg = [
            "aspect"
        ];
        $stamps = $this->crud->read("stamp", $targets, $tablesMrg, $where);
        foreach ($stamps as $stamp) {
            $targets = [
                "category.category"
            ];
            $tablesMrg = [
                "category"
            ];
            $where = [
                "target" => "stamp_id",
                "value" => $stamp["id"]
            ];
            $categories = $this->crud->read("stamp_category", $targets, $tablesMrg, $where);
            $objStamps[] = new Stamp($stamp, $categories);
        }
        return $objStamps;
    }

    public function getObjUsers($where = null) {
        $objUsers = [];
        $users = $this->crud->read("user");
        print_r($users);
        die();
        foreach ($users as $user) {
            $objStamps = [];
            $userId = $user["id"];
            $userStamps = $this->crud->readUserStamp($this->stampReq["targets"], ["target" => "user.id", "value" => $userId]);
            foreach ($userStamps as $userStamp) $objStamps[] = ["stamp" => new Stamp($userStamp), "qty" => $userStamp["qty"]];
            $objUsers[] = new User($user, $objStamps);
        }
        return $objUsers;
    }

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

    public function Update($data) {
        return $this->crud->update($data);
    }
}