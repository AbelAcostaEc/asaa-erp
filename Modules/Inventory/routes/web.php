<?php

use Illuminate\Support\Facades\Route;
use Modules\Inventory\Http\Controllers\InventoryController;

Route::prefix('inventory')->middleware('auth')->group(function () {
    Route::view('/categories', 'inventory::livewire.category.index')->name('inventory.categories');
    Route::view('/products', 'inventory::livewire.product.index')->name('inventory.products');
});
