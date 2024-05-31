<?php

use App\Http\Controllers\SettlementInstituion\LmController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;

Route::middleware([UserAccess::class])->prefix('v1')->group(function () {
    Route::get('fetch-basic', [LmController::class, 'fetchApi']);
});
