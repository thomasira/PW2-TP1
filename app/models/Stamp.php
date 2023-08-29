<?php
/* require PROJECT_ROOT . "/crud/Crud.php"; */

class StampModel {
    public $data;

    function __construct($pdo) {
        $this->name = $name;
        $this->slug = urlencode(strtolower($name));
    }

    static function getAllStamps() {
        $crud = new Crud();
        return $crud->read("stamp");
    }

/*     static function addRecipe($recipeName) {
        $recipe = new RecipeModel($recipeName);
        $recipes = RecipeModel::getAllRecipes();

        $recipes[] = $recipe;

        $encodedRecipes = json_encode($recipes);
        file_put_contents(PROJECT_ROOT . "/db/recipes.json", $encodedRecipes);

        return $recipe;
    } */
}

?>