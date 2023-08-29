<?php

class View {
    static function render($view, $context) {
        extract($context);
        include PROJECT_ROOT . "/partial/school-header.php";
        include PROJECT_ROOT . "/partial/navigation.php";
        require PROJECT_ROOT . "/app/views/$view/index.php";
        include PROJECT_ROOT . "/partial/school-footer.php";
    }
}

?>