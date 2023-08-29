<?php
require_once "./config.php";
require_once(PROJECT_ROOT . "/lib/Router.php");
require_once PROJECT_ROOT . "/crud/Crud.php";

$router = new Router();

$crud = new Crud();
$stamps = $crud->read("stamp");
foreach ($stamps as $stamp) {
    $router->addRoute(SERVER_ROOT, ["controller" => "Page", "action" => "home"]);
}

$router->addRoute(SERVER_ROOT, ["controller" => "Page", "action" => "home"]);
$router->addRoute("/panel", ["controller" => "Panel", "action" => "index"]);
$router->addRoute("/panel/create", ["controller" => "Panel", "action" => "create"]);
$router->dispatch();