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

    static public function panel() {
        ?>

        <main>
            <header>
                <h2>Panel</h2>
            </header>
            <section>
                <div>
                    
                </div>
        

            </section>
        </main>

        <?php
    }
}
?>