<?php

$app->router->get('/costumer/', [\App\Controllers\CostumerController::class, 'index']);
$app->router->get('/costumer/show/', [\App\Controllers\CostumerController::class, 'show', 'id']);
$app->router->post('/costumer/store/', [\App\Controllers\CostumerController::class, 'store']);
$app->router->put('/costumer/update/', [\App\Controllers\CostumerController::class, 'update', 'id']);
$app->router->delete('/costumer/delete/', [\App\Controllers\CostumerController::class, 'delete', 'id']);
