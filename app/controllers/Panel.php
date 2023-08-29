<?php
require_once PROJECT_ROOT . "/lib/View.php";
require_once PROJECT_ROOT . "/app/models/Recipe.php";
require_once PROJECT_ROOT . "/lib/Controller.php";

/**
 * Contrôleur pour le tableau de bord.
 */
class PanelController extends Controller {
	public function indexAction() {
		$recipes = RecipeModel::getAllRecipes();
		View::render("home", ["recipes" => $recipes]);
	}

	public function createAction() {
		$name = $_POST["name"];
	}
}
