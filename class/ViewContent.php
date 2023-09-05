<?php

class ViewContent {

    static public function home($objStamps) {
        ?>
        <main>
            <header>
                <h2>Home</h2>
                <p>welcome to stamp exchange</p>
            </header>
            <section class="flow-stamps">

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