<?php

/**
 * gerer l'affichage des timbres
 */
class Stamp {
    private
    $id,
    $userId,
    $name,
    $description,
    $origin,
    $year,
    $categories,
    $aspect;

    public function __construct($stamp, $categories) {
        $this->id = $stamp["id"];
        $this->userId = $stamp["user_id"];
        $this->name = $stamp["name"];
        $this->description = $stamp["description"];
        $this->origin = $stamp["origin"];
        $this->year = $stamp["year"];
        $this->aspect = $stamp["aspect"];
        $this->categories = $categories;
    }
    
    /**
     * injecter une version courte des données
     */
    public function injectShort() { 
        ?>
        <a href="stamp-show.php?id=<?= $this->id ?>">
        <article class="card-stamp">
                <header>
                    <h3><?= $this->name ?></h3>
                </header>
                <div>
                    <p><?= $this->origin ? $this->origin : "Origin Undefined" ?></p>
                    <p><?= $this->year ? $this->year : "Year Undefined" ?></p>
                </div>
        </article>
        </a>
        <?php
    }

    
    /**
     * injecter une version longue des données
     */
    public function injectLong() { 
        ?>
        <article class="file-stamp">
            <header>
                <h2><?= $this->name ?></h2>
                <p>userId: <?= $this->userId ?></p>
            </header>
            <section>
                <div>
                    <h4>Details</h4>
                    <p><small>origin:</small> <?= $this->origin ? $this->origin : "Origin Undefined" ?></p>
                    <p><small>year:</small> <?= $this->year ? $this->year : "Year Undefined" ?></p>
                    <p><small>aspect:</small> <?= $this->aspect? $this->aspect : "Undefined" ?></p>
                </div>
                <aside>
                    <h4>Categories</h4>
                    <?php foreach ($this->categories as $category) : ?>
                    <p><?= $category["category"] ?></p>
                    <?php endforeach ?>
                </aside>
            </section>
            <section>
                <h4>Description</h4>
                <p><?= $this->description ? $this->description : "Undefined" ?></p>
            </section>
            <section>
                <form action="stamp-modify.php" method="post">
                    <input type="hidden" name="id" value="<?= $this->id ?>">
                    <input type="submit" value="modify" class="button">
                </form>
            </section>
        </article>
        <?php
    }
    
    /**
     * injecter un formulaire de création de timbre
     * 
     * @param $data
     */
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
                    <input type="checkbox" name="category_id[<?= $category["id"] ?>]" value="1">
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
                <input type="submit" value="create" class="button">
           </form>
        </main>
        <?php
    }

    /**
     * injecter un formulaire de modification de timbre
     * 
     * @param $data
     */
    public function stampModifyForm($data) {
        $categories = $data["categories"];
        $aspects = $data["aspects"];
        $users = $data["users"];
        ?>
        <main>
            <header>
                <h2>Modify Stamp</h2>
            </header>
           <form action="update.php" method="post">
                <label>Name:
                    <input type="text" name="data[name]" value="<?= $this->name ?>"required>
                </label>
                <label>Origin:
                    <input type="text" name="data[origin]" value="<?= $this->origin ?>">
                </label>
                <label>Year:
                    <input type="text" name="data[year]" value="<?= $this->year ?>">
                </label>
                <?php foreach ($categories as $category): ?>
                <label><?= $category["category"] ?>
                    <input type="checkbox" id="category_<?= $category["id"] ?>" name="category_id[<?= $category["id"] ?>]" 
                    <?php foreach ($this->categories as $thisCategory) {
                            if ($thisCategory["category"] == $category["category"]) echo "checked";
                    }?> value="1">
                </label>
                <?php endforeach ?>
                <label>Aspect:
                    <select name="data[aspect_id]">
                        <?php foreach ($aspects as $aspect): ?>
                        <option value="<?= $aspect["id"] ?>" <?php if ($this->aspect == $aspect["aspect"]) echo "selected" ?>>
                            <?= $aspect["aspect"] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </label>
                <label>description:
                    <textarea name="data[description]" cols="30" rows="10"><?= $this->description ?></textarea>
                </label>
                <input type="hidden" name="table" value="stamp">
                <input type="hidden" name="data[id]" value="<?= $this->id ?>">
                <input type="submit" value="modify" class="button">
           </form>
           <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?= $this->id ?>">
                <input type="hidden" name="table" value="stamp">
                <input type="submit" value="delete" class="button">
           </form>
        </main>
        <?php
    }

    /**
     * injecter la page d'un timbre
     */
    public function stampShow() {
        ?>
        <main>
        <?= $this->injectLong(); ?>
        </main>
        <?php
    }

    /**
     * injecter la page de timbres
     * 
     * @param $objStamps
     */
    static public function stampIndex($objStamps) {
        ?>
        <main>
            <header>
                <h2>All Stamps</h2>
            </header>
            <section class="flow-stamps">

        <?php foreach ($objStamps as $objStamp) $objStamp->injectShort(); ?>
        
            </section>
        </main>
        <?php
    }
}