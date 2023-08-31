<?php

class ViewContent {

    static public function home($objStamps) {
        ?>

        <main>
            <header>
                <h2>Home</h2>
            </header>
            <section>

        <?php foreach ($objStamps as $objStamp) $objStamp->injectShort(); ?>

            </section>
        </main>

        <?php
    }

    static public function stampShow($objStamp) {
        ?>

        <main>
           <?php $objStamp->injectLong(); ?>
        </main>

        <?php
    }
    

    static public function panel($users, $stamps) {
        $msg = null;
        if (isset($_GET["msg"]) && $_GET["msg"] != null) {
            if ($_GET["msg"] == 1) $msg = "<p>user created</p>";
        }
        ?>
        <?= $msg ?>
        <main>
            <header>
                <h2>Panel</h2>
            </header>
            <div>
                <section>
                    <h3>All users</h3>
                    <ul>
                        <?php foreach ($users as $user) :?>
                        <li><a href="./user-show.php?id=<?= $user->id ?>"><?= $user->name ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <a href="./user-create.php" class="button">create user</a>
                </section>
                <section>
                    <h3>All entries</h3>
                    <ul>
                    <?php foreach ($stamps as $stamp) :?>
                        <li><a href="./stamp-show.php?id=<?= $stamp->id ?>"><?= $stamp->name ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <a href="./stamp-create.php" class="button">add stamp</a>
                </section>
            </div>
        </main>
        <?php
    } 


    static public function userForm() {
        ?>
        <main>
           <form action="" method="post">
                <label>Name:
                    <input type="text" name="name" required>
                </label>
                <label>Email:
                    <input type="text" name="email" required>
                </label>
                <input type="submit" value="create">
           </form>
        </main>
        <?php
    }

    static public function stampForm($categories, $aspects) {
        print_r($data);
        ?>
        <main>
           <form action="" method="post">
                <label>Name:
                    <input type="text" name="name" required>
                </label>
                <label>Origin:
                    <input type="text" name="origin">
                </label>
                <label>Year:
                    <input type="text" name="year">
                </label>
                <label>Category
                    <select name="category">
                        <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
                <label>Aspect
                    <select name="aspect">
                        <?php foreach ($aspects as $aspects) : ?>
                        <option value="<?= $aspect["id"] ?>"><?= $aspect["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
                <label>description:
                    <textarea name="description" cols="30" rows="10"></textarea>
                </label>

                <input type="submit" value="create">
           </form>
        </main>
        <?php
    }
}
?>