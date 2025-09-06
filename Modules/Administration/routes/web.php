<?php

use Illuminate\Support\Facades\Route;
use Modules\Administration\Http\Controllers\AdministrationController;

Route::prefix('administration')->middleware('auth')->group(function () {
    Route::view('/dashboard', 'administration::livewire.dashboard.index')->name('administration.dashboard');
});
