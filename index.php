<?php

use App\Controllers\CustomerController;
use App\Router;

require_once __DIR__ . "/env.php";
require_once __DIR__ . "/config.php";

require_once __DIR__ . "/vendor/autoload.php";

$router = new Router();
Router::get("/", [CustomerController::class, "index"]);
Router::get("/create", [CustomerController::class, "create"]);
Router::post("/create", [CustomerController::class, "store"]);
Router::get("/edit", [CustomerController::class, "edit"]);
Router::post("/edit", [CustomerController::class, "update"]);
Router::get("/delete", [CustomerController::class, "delete"]);


$router->resolve();