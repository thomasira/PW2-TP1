<?php

class Crud extends PDO {
    public $dbname;
    public function __construct($dbname) {
        parent::__construct("mysql:host=localhost;dbname=$dbname;port=3306;charset=utf8", "root", "");
        $this->dbname = $dbname;
    }

/*     public function read($table, $field = "id", $order = "ASC") {
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $query = $this->query($sql);
        return $query->fetchAll();
    } */

    public function read($tableOg, $target = "*", $tablesMg = null, $field = "id", $order = "ASC") {
        if ($target != "*") $target = implode(", ", $target);
        if ($tablesMg) {
            $sqlMerge = "";
            foreach ($tablesMg as $tableMg) {
                $idOg = $tableMg . "_id";
                $id = $tableMg . ".id";
                $sqlMerge .= " INNER JOIN $this->dbname.$tableMg ON $id = $idOg";
            }
            $sql = "SELECT $target FROM $tableOg" . "$sqlMerge;";
        } else {
            $sql = "SELECT $target FROM $tableOg";
        }
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    /* public function readId($table, $value, $field = "id", $url = "client-index.php") {
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
        
    } */
}

?>
