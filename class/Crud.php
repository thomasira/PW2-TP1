<?php

/**
 * gèrer les requêtes à la DB, étendre la classe PDO
 */
class Crud extends PDO {
    public $dbname;

    /**
     * établir les params. de la classe parent et la prop. dbname
     */
    public function __construct($dbname) {
        parent::__construct("mysql:host=localhost;dbname=$dbname;port=3306;charset=utf8", "root", "");
        $this->dbname = $dbname;
    }

    /**
     * préparer et executer les requêtes CREATE à la DB 
     * 
     * @param $table, $data
     */
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

    /**
     * préparer et executer les requêtes READ à la DB
     * 
     * @param $tableOg, $targets, $tablesMrg, $where, $field, $order
     */
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

    /**
     * préparer et executer les requêtes UPDATE à la DB
     * 
     * @param $data
     */
    public function update($data) {
        print_r($data);
        $table = $data["table"];
        $data = $data["data"];
        $id = $data["id"];
        $set = "";
        foreach ($data as $key => $value) {
            $set .= " $key = :$key,";
        }
        $set = rtrim($set, ",");
        $sql = "UPDATE $table SET $set WHERE id = :id";
        $query = $this->prepare($sql);
        foreach ($data as $key => $value) $query->bindValue(":$key", $value);
        $query->execute();
    }

    /**
     * préparer et executer les requêtes DELETE à la DB
     * 
     * @param $table, $where
     */
    public function delete($table, $where) {
        $target = $where["target"];
        $value = $where["value"];
        $sqlWhere = " WHERE $target = :$target";
        $sql = "DELETE FROM $table $sqlWhere";
        $query = $this->prepare($sql);
        $query->bindValue(":$target", $value);
        $query->execute();
    }
}

?>
