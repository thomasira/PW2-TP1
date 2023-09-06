<?php

/**
 * gerer l'affichage du Panel
 */
class Panel {

    /**
     * afficher le panel
     * 
     * @param $data
     */
    static public function panelIndex($data) {
        $users = $data["users"];
        $stamps = $data["stamps"];
        $aspects = $data["aspects"];
        $categories = $data["categories"];
        ?>
        <main>
            <header>
                <h2>Panel</h2>
            </header>
            <div class="panel">
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
}