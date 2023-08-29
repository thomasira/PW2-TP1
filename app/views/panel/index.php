<?php include_once PROJECT_ROOT . "/partial/head.php" ?>

<body>
    <header>
        <h1>Ajouter une Recette</h1>
    </header>
    <form action="/panel/create" method="post">
        <label>Nom de la page:
            <input type="text" name="name">
        </label>
        <button>Ajouter</button>
    </form>
</body>

?> 