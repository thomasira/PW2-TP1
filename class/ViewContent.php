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
}
?>