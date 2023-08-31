<?php

class User {
    private 
        $id,
        $name,
        $email,
        $stamps;


    public function __construct($user, $userStamps) {
        $this->id = $user["id"];
        $this->name = $user["name"];
        $this->email = $user["email"];
        $this->stamps = $userStamps;
    }

    public function getName() {
        return $this->name;
    }


    public function injectLong() {
        ?>
        <header>
            <h2><?= $this->name ?></h2>
            <div>
                <p><?= $this->email ? $this->email : "Email Undefined" ?></p>
            </div>
        </header>
        <section>
            <h3>My stamps</h3>
            <ul>
                <?php foreach($this->stamps as $stamp) : ?>
                    <li><?= $stamp->getName() ?></li>
                <?php endforeach ?>
            </ul>
        </section>

        <?php
    }
}
?>