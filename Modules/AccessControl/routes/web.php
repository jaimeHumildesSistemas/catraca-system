<?php

use Illuminate\Support\Facades\Route;
use Modules\AccessControl\Http\Controllers\AccessControlController;

Route::prefix('accesscontrol')->group(function () {
    Route::get('/', [AccessControlController::class, 'index']);
});
