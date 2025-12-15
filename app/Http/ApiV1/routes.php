<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    $files = glob(__DIR__ . '/*/*/routes.php');

    foreach ($files as $routesFile) {
        require $routesFile;
    }
});
