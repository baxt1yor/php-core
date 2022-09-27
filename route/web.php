<?php

use Website\Controller\AuthController;
use Website\Controller\SiteController;
use Website\Core\Route;

return [
    Route::get('/', [SiteController::class, 'index']),
    Route::get("/home", [SiteController::class, 'index']),
    Route::get("/report", [SiteController::class, 'report']),
    Route::get('/login', [AuthController::class, 'login'])
];