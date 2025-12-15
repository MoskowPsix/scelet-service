<?php

// Загружаем только API модули (ApiV1), исключаем web-модули (Modules)
$files = glob(__DIR__ . '/ApiV1/routes.php');

foreach ($files as $routesFile) {
    require $routesFile;
}
