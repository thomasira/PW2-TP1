<?php

class Stamp {
    private 
    $name,
    $description,
    $year;

    public function __construct($stamp) {
        $this->name = $stamp["name"];
        $this->description = $stamp["description"];
        $this->origin = $stamp["origin"];
        $this->year = $stamp["year"];
    }

/*     public function getProp() {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "year" => $this->year
        ];
    } */

    public function formatHTML() {

    }
}