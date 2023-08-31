<?php

class User {
    
    public function __construct($user, $userStamps) {
        $this->id = $user["id"];
        $this->name = $user["name"];
        $this->email = $user["email"];
        $this->stamps = $userStamps;
    }

    public function getName() {
        return $this->name;
    }


    public function inject() {

    }
}
?>