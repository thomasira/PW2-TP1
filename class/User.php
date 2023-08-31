<?php

class User {
    private 
        $id,
        $name,
        $email;
    public $stamps;


    public function __construct($user, $userStamps) {
        $this->id = $user["id"];
        $this->name = $user["name"];
        $this->email = $user["email"];
        $this->stamps = $userStamps;
    }

    public function getName() {
        return $this->name;
    }
    public function getEmail() {
        return $this->email;
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
                    <li><a href="stamp-show.php?id=<?= $stamp["stamp"]->getId() ?>"><?= $stamp["stamp"]->getName() ?></a></li>
                <?php endforeach ?>
            </ul>
        </section>
        <form action="user-modify.php" method="post">
            <input type="hidden" name="id" value="<?= $this->id ?>">
            <input type="submit" value="modify user">
        </form>
        <?php
    }
}
?>