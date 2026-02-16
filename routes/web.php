<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdministrateursController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'accueil'])->name('accueil');
Route::get('/application/migban', [PagesController::class, 'serviceDetail'])->name('services.detail');

// Route::get('/administration',[AdministrateursController::class,'accueil'])->name('admin.accueil');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
Route::get('/services', [PagesController::class, 'detaille'])->name('detaille');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Administration routes
    Route::prefix('administrateurs')->group(function () {
        Route::get('/', [AdministrateursController::class, 'accueil'])->name('administrateurs.accueil');
        Route::get('/accueil', [AdministrateursController::class, 'accueil'])->name('administrateurs.accueil');
        
        // Routes categories
        Route::prefix('categories')->group(function () { 
            Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
            Route::post('/', [CategoriesController::class, 'store'])->name('categories.store');
            Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create');
            Route::get('/{category}', [CategoriesController::class, 'show'])->name('categories.show');
            Route::get('/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
            Route::put('/{category}', [CategoriesController::class, 'update'])->name('categories.update');
            Route::delete('/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
            
            // Routes supplémentaires
            Route::get('/toggle-status/{category}', [CategoriesController::class, 'toggleStatus'])->name('categories.toggle-status');
            Route::post('/update-order', [CategoriesController::class, 'updateOrder'])->name('categories.update-order');
            Route::get('/stats', [CategoriesController::class, 'getStats'])->name('categories.stats');
            Route::get('/search', [CategoriesController::class, 'search'])->name('categories.search');
            Route::get('/menu', [CategoriesController::class, 'getMenuCategories'])->name('categories.menu');
            Route::get('/tree', [CategoriesController::class, 'getTree'])->name('categories.tree');
            
            // Routes pour les catégories supprimées
            Route::get('/trashed', [CategoriesController::class, 'trashed'])->name('categories.trashed');
            Route::post('/restore/{category}', [CategoriesController::class, 'restore'])->name('categories.restore');
            Route::delete('/force-delete/{category}', [CategoriesController::class, 'forceDelete'])->name('categories.force-delete');
        });

        // Routes services
        Route::prefix('services')->group(function () {
            Route::get('/', [ServicesController::class, 'index'])->name('services.index');
            Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
            Route::post('/', [ServicesController::class, 'store'])->name('services.store');
            Route::get('/{service}', [ServicesController::class, 'show'])->name('services.show');
            Route::get('/{service}/edit', [ServicesController::class, 'edit'])->name('services.edit');
            Route::put('/{service}', [ServicesController::class, 'update'])->name('services.update');
            Route::delete('/{service}', [ServicesController::class, 'destroy'])->name('services.destroy');
            
            // Routes supplémentaires
            Route::get('/toggle-featured/{service}', [ServicesController::class, 'toggleFeatured'])->name('services.toggle-featured');
            Route::get('/toggle-status/{service}', [ServicesController::class, 'toggleStatus'])->name('services.toggle-status');
        });
    });
});


require __DIR__.'/auth.php'; 