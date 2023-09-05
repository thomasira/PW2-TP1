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
    public function getId() {
        return $this->id;
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
                    <li><?php $stamp->injectShort() ?></a></li>
                <?php endforeach ?>
            </ul>
            <form action="stamp-create.php" method="post">
                <input type="hidden" name="userId" value="<?= $this->id ?>">
                <input type="submit" value="add stamp">
            </form>
        </section>
        <form action="user-modify.php" method="post">
            <input type="hidden" name="id" value="<?= $this->id ?>">
            <input type="submit" value="modify user">
        </form>
        <?php
    }

    static public function userCreateForm() {
        ?>
        <main>
            <header>
                <h2>Create User</h2>
            </header>
           <form action="create.php" method="post">
                <input type="hidden" name="table" value="user">
                <label>Name:
                    <input type="text" name="data[name]" required>
                </label>
                <label>Email:
                    <input type="text" name="data[email]">
                </label>
                <input type="submit" value="create">
           </form>
        </main>
        <?php
    }

    public function userModifyForm() {
        ?>
        <main>
            <header>
                <h2>Modify User</h2>
            </header>
           <form action="update.php" method="post">
                <input type="hidden" name="table" value="user">
                <input type="hidden" name="data[id]" value="<?= $this->id ?>">
                <label>Name:
                    <input type="text" name="data[name]" value="<?= $this->name ?>" required>
                </label>
                <label>Email:
                    <input type="text" name="data[email]" value="<?= $this->email ?>">
                </label>
                <input type="submit" value="modify">
           </form>
           <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?= $this->id ?>">
                <input type="hidden" name="table" value="user">
                <input type="submit" value="delete">
           </form>
        </main>
        <?php
    }
}
?>
