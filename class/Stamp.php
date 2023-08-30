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

    
    public function formatHTML() {
        
    }
}