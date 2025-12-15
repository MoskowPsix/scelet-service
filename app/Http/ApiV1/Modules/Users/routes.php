<?php

use App\Http\ApiV1\Modules\Users\Controllers\UserController;

Route::get('/users/users', [UserController::class, 'get']);
