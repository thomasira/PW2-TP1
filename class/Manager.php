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
        return $this->crud->read("stamp", ["stamp.id", "stamp.name"]);
    }

    public function getStampFormData() {
        $data["users"] = $this->crud->read("user", ["user.name", "user.id"]);
        $data["categories"] = $this->crud->read("category");
        $data["aspects"] = $this->crud->read("aspect");
        return $data;
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
        $users = $this->crud->read("user", "*", null, $where);
        foreach ($users as $user) {
            $objStamps = [];
            $userId = $user["id"];
            $userStamps = $this->getObjStamps(["target" => "user_id", "value" => $userId]);
            $objUsers[] = new User($user, $userStamps);
        }
        return $objUsers;
    }


    public function getCategories() {
        return $this->crud->read("category");
    }

    public function getUserNames() {
        return $this->crud->read("user", ["user.name", "user.id"]);
    }
    public function getAspects() {
        return $this->crud->read("aspect");
    }

    public function getAllShort() {
        $data["stamps"] = $this->getStampNames();
        $data["users"] = $this->getUserNames();
        $data["categories"] = $this->getCategories();
        $data["aspects"] = $this->getAspects();
        return $data;
    }

    public function create($data) {
        $lastId = $this->crud->create($data["table"], $data["data"]);
        if ($data["table"] == "stamp" && isset($data["category_id"])) {
            foreach ($data["category_id"] as $categoryId => $on) {
                $stampCatData = [
                    "stamp_id" => $lastId,
                    "category_id" => $categoryId
                ];
                $this->crud->create("stamp_category", $stampCatData);
            }
        }
        return $lastId;
    }

    public function update($data) {
        $this->crud->update($data);
        $id = $data["data"]["id"];
        if ($data["table"] == "stamp") {
            $stampId = $data["data"]["id"];
            $this->crud->delete("stamp_category", ["target" => "stamp_id", "value" => $stampId]);
            foreach ($data["category_id"] as $categoryId => $on) {
                $stampCatData = [
                    "stamp_id" => $stampId,
                    "category_id" => $categoryId
                ];
                $this->crud->create("stamp_category", $stampCatData);
            }
        }
    }

    public function delete($data) { 
        if ($data["table"] == "stamp") {
            $stampId = $data["id"];
            $this->crud->delete("stamp_category", ["target" => "stamp_id", "value" => $stampId]);
        }
        if ($data["table"] == "user") {
            $stampData["table"] = "stamp";
            $stampData["user_id"] = $data["data"]["id"]
            $userId = $data["id"];
            $this->crud->delete("stamp_category", ["target" => "stamp_id", "value" => $stampId]);
        }
        $this->crud->delete($data["table"], ["target" => "id", "value" => $data["id"]]);
    }
}