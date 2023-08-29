<?php

class Crud extends PDO {

    public function __construct() {
        parent::__construct("mysql:host=localhost;dbname=ecommerce;port=3306;charset=utf8", "root", "");
    }

    public function read($table, $field = "id", $order = "ASC") {
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    public function readId($table, $value, $field = "id", $url = "client-index.php") {
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $query = $this->prepare($sql);
        $query->bindValue(":$field", $value);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) return $query->fetchAll();
        else header("location: $url");
    }

    public function create($table, $data) {
        $fieldName = implode(", ", array_keys($data));
        $fieldSafe = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldSafe)";
        $query = $this->prepare($sql);
        foreach ($data as $key => $value) $query->bindValue(":$key", $value);
        return $this->lastInsertId();
    }

    public function delete($table, $field = "id") {
        
    }
}

?>
