<?php

error_reporting(1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use App\Application;

$app = new Application();


$app->router->get('/costumer/', [\App\Controllers\CostumerController::class, 'index']);



$app->run();
?>
