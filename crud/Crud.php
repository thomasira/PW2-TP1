<?php

class Crud extends PDO {
    public $dbname;


    public function __construct($dbname) {
        parent::__construct("mysql:host=localhost;dbname=$dbname;port=3306;charset=utf8", "root", "");
        $this->dbname = $dbname;
    }

    public function read($tableOg, $targets = "*", $tablesMrg = null, $where = null, $field = "id", $order = "ASC") {
        $sqlWhere = "";
        if ($where) {
            $target = $where["target"];
            $value = $where["value"];
            $sqlWhere = " WHERE $target = $value";
        }
        if ($targets != "*") $targets = implode(", ", $targets);
        $sql = "SELECT $targets FROM $tableOg";
        if ($tablesMrg) {
            $sqlMerge = "";
            foreach ($tablesMrg as $tableMrg) {
                $idOg = $tableMrg . "_id";
                $id = $tableMrg . ".id";
                $sqlMerge .= " INNER JOIN $this->dbname.$tableMrg ON $id = $idOg";
            }
            $sql .= "$sqlMerge";
        } 
        $sql .= "$sqlWhere;";
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    public function readUserStamp($targets = "*", $where = null) {
        $sqlWhere = "";
        if ($where) {
            $target = $where["target"];
            $value = $where["value"];
            $sqlWhere = "WHERE $target = $value";
        }
        $tableOg = "user_stamp";
        if ($targets != "*") $targets = implode(", ", $targets); 
        $sql = "SELECT $targets FROM $tableOg
            INNER JOIN user ON user_stamp.user_id = user.id 
            INNER JOIN stamp ON user_stamp.stamp_id = stamp.id
            INNER JOIN aspect ON stamp.aspect_id = aspect.id
            INNER JOIN category ON stamp.category_id = category.id
            $sqlWhere";
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    public function create($table, $data) {
        $fieldName = implode(", ", array_keys($data));
        $fieldSafe = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldSafe)";
        $query = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        $query->execute();
        return $this->lastInsertId();
    }

    public function update($data) {
        $table = $data["table"];
        $id = $data["id"];
        $set = "";
        foreach ($data as $key => $value) {
            if ($key != "table") $set .= " $key = :$key,";
        }
        $set = rtrim($set, ",");
        $sql = "UPDATE $table SET $set WHERE id = :id";
        $query = $this->prepare($sql);
        foreach ($data as $key => $value) $query->bindValue(":$key", $value);
        $query->execute();
        return $id;
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
