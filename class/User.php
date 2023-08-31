<?php

class User {
    
    public function __construct($user, $userStamps) {
        $this->name = $user["name"];
        $this->email = $user["email"];
        $this->stamps = $userStamps;
    }

    public function inject() {
        
    }
}
?>