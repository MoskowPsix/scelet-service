<?php

use App\Http\OpenApiDocumentation\Controllers\DocsController;

Route::get('/docs', [DocsController::class, 'index'])->name('docs.index');

