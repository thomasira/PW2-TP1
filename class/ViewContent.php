<?php

class ViewContent {

    static public function home($objStamps) {
        ?>
        <main>
            <header>
                <h2>Home</h2>
                <p>recent entries</p>
            </header>
            <section>

        <?php 
        if (count($objStamps) > 5) {
            for ($i=0; $i < 5; $i++) { 
                $objStamps[$i]->injectShort();
            }
        } else {
            foreach ($objStamps as $objStamp) $objStamp->injectShort();
        }
         ?>
            </section>
        </main>
        <?php
    }

    static public function panel($data) {
        $users = $data["users"];
        $stamps = $data["stamps"];
        $aspects = $data["aspects"];
        $categories = $data["categories"];

        $msg = null;
        if (isset($_GET["msg"]) && $_GET["msg"] != null) {
            if ($_GET["msg"] == 1) $msg = "<p>user created</p>";
            if ($_GET["msg"] == 2) $msg = "<p>stamp created</p>";
            if ($_GET["msg"] == 3) $msg = "<p>aspect created</p>";
            if ($_GET["msg"] == 4) $msg = "<p>category created</p>";
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
                        <li><a href="./user-show.php?id=<?= $user["id"] ?>"><?= $user["name"] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <a href="./user-create.php" class="button">create user</a>
                </section>
                <section>
                    <h3>All stamps</h3>
                    <ul>
                    <?php foreach ($stamps as $stamp) :?>
                        <li><a href="./stamp-show.php?id=<?= $stamp["id"] ?>"><?= $stamp["name"] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <a href="./stamp-create.php" class="button">add stamp</a>
                </section>
                <section>
                    <h3>All aspects</h3>
                    <ul>
                    <?php foreach ($aspects as $aspect) :?>
                        <li><?= $aspect["aspect"] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <a href="./aspect-create.php" class="button">add aspect</a>
                </section>
                <section>
                    <h3>All categories</h3>
                    <ul>
                    <?php foreach ($categories as $category) :?>
                        <li><?= $category["category"] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <a href="./category-create.php" class="button">add category</a>
                </section>
            </div>
        </main>
        <?php
    } 



    static public function aspectForm() {
        ?>
        <main>
            <header>
                <h2>Add Aspect</h2>
            </header>
           <form action="create.php" method="post">
                <input type="hidden" name="table" value="aspect">
                <label>Name:
                    <input type="text" name="data[aspect]" required>
                </label>
                <input type="submit" value="create">
           </form>
        </main>
        <?php
    }

    static public function categoryForm() {
        ?>
        <main>
            <header>
                <h2>Add Category</h2>
            </header>
           <form action="create.php" method="post">
            <input type="hidden" name="table" value="category">
                <label>Name:
                    <input type="text" name="data[category]" required>
                </label>
                <input type="submit" value="create">
           </form>
        </main>
        <?php
    }

}
?>