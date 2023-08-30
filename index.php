<?php
include "./partial/school-header.php";
include "./partial/navigation.php";
require "./class/Stamp.php";
require "./crud/crud.php";

$tableOg = "stamp";
$tablesMg = [
    "aspect",
    "category"
];
$targets = [
    "stamp.id",
    "stamp.name as name",
    "stamp.year",
    "stamp.origin",
    "stamp.description",
    "aspect.name as aspect", 
    "category.name as category"
];
$crud = new Crud("stamp");
$stamps = $crud->read($tableOg, $targets, $tablesMg);
?>

<main>

<?php foreach ($stamps as $stamp) : ?>
    <article class="stamp-card">
        <hgroup>
            <h2><?= $stamp["name"] ?></h2>
            <?php if ($stamp["description"]): ?>
            <p><?= $stamp["description"] ?></p>
            <?php endif; ?>
        </hgroup>
        <div>

        </div>
    </article>


<?php endforeach; ?>


</main>


<?php include "./partial/school-footer.php"; ?>