<?php

require_once PROJECT_ROOT . "/lib/Controller.php";
require_once PROJECT_ROOT . "/app/models/Stamp.php";
require_once PROJECT_ROOT . "/lib/View.php";

/**
 * Contrôleur pour toutes les pages « normales », c'est-à-dire toutes
 * les pages sauf celles du tableau de bord.
 */
class PageController extends Controller {
	
	public function homeAction() {
        $stamps = StampModel::getAllStamps();
		View::render("home", ["stamps" => $stamps]);
	}

	public function recipeIndexAction() {

	}
}

?>