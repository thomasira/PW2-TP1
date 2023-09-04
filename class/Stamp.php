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
        <aside>
            <?php foreach ($this->categories as $category) : ?>
            <p><?= $category["category"] ?></p>
            <?php endforeach ?>
        </aside>
        <section>
            <p><small>description:</small> <?= $this->description ? $this->description : "Undefined" ?></p>
            <p><small>aspect:</small> <?= $this->aspect? $this->aspect : "Undefined" ?></p>
        </section>
        <section>
            <form action="stamp-modify.php" method="post">
                <input type="hidden" name="id" value="<?= $this->id ?>">
                <input type="submit" value="modify">
            </form>
        </section>
        <?php
    }

    static public function stampCreateForm($data) {
        $categories = $data["categories"];
        $aspects = $data["aspects"];
        $users = $data["users"];
        ?>
        <main>
            <header>
                <h2>Add Stamp</h2>
            </header>
           <form action="create.php" method="post">
                <input type="hidden" name="table" value="stamp">
                <label>Name:
                    <input type="text" name="data[name]" required>
                </label>
                <label>Origin:
                    <input type="text" name="data[origin]">
                </label>
                <label>Year:
                    <input type="text" name="data[year]">
                </label>
                <?php foreach ($categories as $category) : ?>
                <label><?= $category["category"] ?>
                    <input type="checkbox" id="category_<?= $category["id"] ?>" name="category_id[<?= $category["id"] ?>]" value="1">
                </label>
                <?php endforeach ?>
                </label>
                <label>Aspect:
                    <select name="data[aspect_id]">
                        <?php foreach ($aspects as $aspect) : ?>
                        <option value="<?= $aspect["id"] ?>"><?= $aspect["aspect"] ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
                <label>description:
                    <textarea name="data[description]" cols="30" rows="10"></textarea>
                </label>
                <label>User
                    <select name="data[user_id]">
                    <?php foreach ($users as $user) : ?>
                            <option value="<?= $user["id"] ?>"><?= $user["name"] ?></option>
                    <?php endforeach ?>
                    </select>
                </label>
                <input type="submit" value="create">
           </form>
        </main>
        <?php
    }
}