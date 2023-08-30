<?php

class Stamp {
    private 
    $name,
    $description,
    $year,
    $category,
    $aspect;

    public function __construct($stamp) {
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
                <h2><?= $this->name?></h2>
                <div>
                    <p><?= $this->origin ? $this->origin : "Origin Undefined" ?></p>
                    <p><?= $this->year ? $this->year : "Year Undefined" ?></p>
                </div>
            </hgroup>
        </article>
<?php
    }
}