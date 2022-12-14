<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/people',[PeopleController::class,'index'])->name('people.index');
    Route::post('/people',[PeopleController::class,'store'])->name('people.store');
    Route::get('/people/{people}',[PeopleController::class,'edit'])->name('people.edit');
    Route::put('/people/{people}',[PeopleController::class,'update'])->name('people.update');

});
require __DIR__.'/auth.php';
