

<body>
    <main>

<?php foreach ($stamps as $stamp) : ?>
    <article> 
        <hgroup>
            <h2><a href="<?= SERVER_ROOT . urlencode($stamp["name"])?>"><?= $stamp["name"] ?></a></h2>
            <p><?= $stamp["description"] ?></p>
        </hgroup>  
    </article>
<?php endforeach ?>

    </main>


</body>



