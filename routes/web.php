<?php

use Illuminate\Support\Facades\Route;

// Загружаем маршруты документации
require __DIR__ . '/../app/Http/OpenApiDocumentation/routes.php';

// Загружаем web-модули
$moduleFiles = glob(__DIR__ . '/../app/Http/Modules/*/routes.php');
foreach ($moduleFiles as $routesFile) {
    require $routesFile;
}

