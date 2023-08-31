<?php

class Stamp {
    private 
    $id,
    $name,
    $description,
    $origin,
    $year,
    $category,
    $aspect;

    public function __construct($stamp) {
        $this->id =$stamp["id"];
        $this->name = $stamp["name"];
        $this->description = $stamp["description"];
        $this->origin = $stamp["origin"];
        $this->year = $stamp["year"];
        $this->category = $stamp["category"];
        $this->aspect = $stamp["aspect"];
    }

    public function injectShort() { ?>

        <article class="stamp-card">
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
}