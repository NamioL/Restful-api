<?php

error_reporting(1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use App\Application;

$app = new Application();

//TODO move somewhere else routes

$app->router->get('/costumer/', [\App\Controllers\CostumerController::class, 'index']);
$app->router->get('/costumer/show/', [\App\Controllers\CostumerController::class, 'show', 'id']);



$app->run();
?>
