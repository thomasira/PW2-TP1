<?php
require "./class/Crud.php";
require "./class/Stamp.php";
require "./class/User.php";
require "./class/Panel.php";

/**
 * gerér les demandes entres les vues et la DB
 */
class Manager {
    private $crud;

    /**
     * établir un crud pour la classe
     */
    public function __construct() {
        $this->crud = new Crud("e2395387");
    }

    /**
     * retourner les noms et ids des étampes de la DB
     * 
     * @param $where 
     */
    public function getStampNames($where = null) { 
        return $this->crud->read("pw2tp1_stamp", ["pw2tp1_stamp.id", "pw2tp1_stamp.name"], null, $where);
    }

    /**
     * retourner un tableau d'objets Stamp créé à partir des données de la DB
     * 
     * @param $where
     */
    public function getObjStamps($where = null) {
        $objStamps = [];
        $targets = [
            "pw2tp1_stamp.*",
            "pw2tp1_aspect.aspect"
        ];
        $tablesMrg = [
            "pw2tp1_aspect"
        ];
        $stamps = $this->crud->read("pw2tp1_stamp", $targets, $tablesMrg, $where);
        foreach ($stamps as $stamp) {
            $targets = [
                "pw2tp1_category.category"
            ];
            $tablesMrg = [
                "pw2tp1_category"
            ];
            $where = [
                "target" => "stamp_id",
                "value" => $stamp["id"]
            ];
            $categories = $this->crud->read("pw2tp1_stamp_category", $targets, $tablesMrg, $where);
            $objStamps[] = new Stamp($stamp, $categories);
        }
        return $objStamps;
    }

    /**
     * retourner les noms et ids des utilisateurs de la DB
     */
    public function getUserNames() {
        return $this->crud->read("pw2tp1_user", ["pw2tp1_user.name", "pw2tp1_user.id"]);
    }

    /**
     * retourne un tableau d'objets User créé à partir des données de la DB
     * 
     * @param $where
     */
    public function getObjUsers($where = null) {
        $objUsers = [];
        $users = $this->crud->read("pw2tp1_user", "*", null, $where);
        foreach ($users as $user) {
            $objStamps = [];
            $userId = $user["id"];
            $userStamps = $this->getObjStamps(["target" => "user_id", "value" => $userId]);
            $objUsers[] = new User($user, $userStamps);
        }
        return $objUsers;
    }

    /**
     * retourner la donnée requise pour le formulaire Stamp
     */
    public function getStampFormData() {
        $data["users"] = $this->getUserNames();
        $data["categories"] = $this->crud->read("pw2tp1_category");
        $data["aspects"] = $this->crud->read("pw2tp1_aspect");
        return $data;
    }

    /**
     * retourner les info noms et id de toute les tables(sauf clé composé)
     */
    public function getAllShort() {
        $data["stamps"] = $this->getStampNames();
        $data["users"] = $this->getUserNames();
        $data["categories"] = $this->crud->read("pw2tp1_category");
        $data["aspects"] = $this->crud->read("pw2tp1_aspect");
        return $data;
    }

    /**
     * évaluer la requête et créér les entrées requise dans la DB, retourner le ID
     * 
     * @param $data
     */
    public function create($data) {
        $lastId = $this->crud->create($data["table"], $data["data"]);
        if ($data["table"] == "pw2tp1_stamp" && isset($data["category_id"])) {
            foreach ($data["category_id"] as $categoryId => $on) {
                $stampCatData = [
                    "stamp_id" => $lastId,
                    "category_id" => $categoryId
                ];
                $this->crud->create("pw2tp1_stamp_category", $stampCatData);
            }
        }
        return $lastId;
    }

    /**
     *  évaluer la requête et mettre à jour les entrées requise dans la DB
     * 
     * @param $data
     */
    public function update($data) {
        $this->crud->update($data);
        $id = $data["data"]["id"];
        if ($data["table"] == "pw2tp1_stamp") {
            $stampId = $data["data"]["id"];
            $this->crud->delete("pw2tp1_stamp_category", ["target" => "stamp_id", "value" => $stampId]);
            foreach ($data["category_id"] as $categoryId => $on) {
                $stampCatData = [
                    "stamp_id" => $stampId,
                    "category_id" => $categoryId
                ];
                $this->crud->create("pw2tp1_stamp_category", $stampCatData);
            }
        }
    }

    /**
     * évaluer la requête et supprimer les entrées requise dans la DB
     */
    public function delete($data) { 
        if ($data["table"] == "pw2tp1_stamp") {
            $stampId = $data["id"];
            $this->crud->delete("pw2tp1_stamp_category", ["target" => "stamp_id", "value" => $stampId]);
        }
        if ($data["table"] == "pw2tp1_user") {
            $userStamps = $this->getStampNames(["target" => "user_id", "value" => $data["id"]]);
            foreach ($userStamps as $userStamp) {
                $stampData["table"] = "pw2tp1_stamp";
                $stampData["id"] = $userStamp["id"];
                $this->delete($stampData);
            }
        }
        $this->crud->delete($data["table"], ["target" => "id", "value" => $data["id"]]);
    }
}