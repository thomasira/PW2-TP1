<?php

class Stamp {
    private
    $id,
    $name,
    $description,
    $origin,
    $year,
    $categories,
    $aspect;

    public function __construct($stamp, $categories) {
        $this->id =$stamp["id"];
        $this->name = $stamp["name"];
        $this->description = $stamp["description"];
        $this->origin = $stamp["origin"];
        $this->year = $stamp["year"];
        $this->aspect = $stamp["aspect"];
        $this->categories = $categories;
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }
    
    public function injectShort() { 
        ?>
        <article>
            <hgroup>
                <h2><a href="stamp-show.php?id=<?= $this->id ?>"><?= $this->name?></a></h2>
                <div>
                    <p><?= $this->origin ? $this->origin : "Origin Undefined" ?></p>
                    <p><?= $this->year ? $this->year : "Year Undefined" ?></p>
                </div>
            </hgroup>
        </article>
        <?php
    }


    public function injectLong() { 
        ?>
        <header>
            <h2><?= $this->name ?></h2>
            <div>
                <p><?= $this->origin ? $this->origin : "Origin Undefined" ?></p>
                <p><?= $this->year ? $this->year : "Year Undefined" ?></p>
            </div>
        </header>
        <ul>
            <li>description: <?= $this->description ? $this->description : "Undefined" ?></li>
            <li>aspect: <?= $this->aspect? $this->aspect : "Undefined" ?></li>
        </ul>
        <section>
            <form action="stamp-modify.php" method="post">
                <input type="hidden" name="id" value="<?= $this->id ?>">
                <input type="submit" value="modify">
            </form>
        </section>
        <?php
    }
}