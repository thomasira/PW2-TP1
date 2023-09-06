<?php

/**
 * gerer l'affichage des utilisateurs
 */
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

    public function getId() {
        return $this->id;
    }

    /**
     * injecter une version longue des données
     */
    public function injectLong() {
        ?>
        <section class="file-user">
            <header>
                <h2><?= $this->name ?></h2>
                <div>
                    <p><?= $this->email ? $this->email : "Email Undefined" ?></p>
                </div>
            </header>
            <div>
                <h3>My stamps</h3>
                <div class="flow-stamps">
                    <?php foreach($this->stamps as $stamp) : ?>
                        <?php $stamp->injectShort() ?>
                    <?php endforeach ?>
                </div>
                <form action="stamp-create.php" method="post">
                    <input type="hidden" name="userId" value="<?= $this->id ?>">
                    <input type="submit" value="add stamp">
                </form>
            </div>
            <form action="user-modify.php" method="post">
                <input type="hidden" name="id" value="<?= $this->id ?>">
                <input type="submit" value="modify user">
            </form>
        </section>
        <?php
    }

    /**
     * injecter un formulaire de création d'utilisateur
     * @param $data
     */
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

    /**
     * injecter un formulaire de modification d'utilisateur'
     * 
     * @param $data
     */
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

    /**
     * injecter la page d'un utilisateur
     */
    public function userShow() {
        ?>
        <main>

        <?= $this->injectLong() ?>

        </main>
        <?php
    }

    /**
     * injecter la page des utilisateurs
     * 
     * @param $users
     */
    static public function userIndex($users) {
        ?>
        <main>
            <header>
                <h2>Users</h2>
            </header>
            <section class="flow-user">

            <?php foreach ($users as $user) : ?>
                <a href="user-show.php?id=<?= $user->getId() ?>"><h3><?= $user->getName() ?></h3></a>
            <?php endforeach ?>
            </section>
        </main>
        <?php
    }
    
}
?>
