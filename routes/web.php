<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
//IMPORTO IL PROJECTCONTROLLER
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Guest\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/projects', [UserController::class, 'projects_view'])->name('projects_view');
Route::get('/types', [UserController::class, 'types_view'])->name('types_view');
Route::get('/languages', [UserController::class, 'languages_view'])->name('languages_view');

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //METTO LA RESOURCE ROUTE IN ADMIN CHE MI CAMBIA TUTTE LE ROTTE NEL NOME CHE VOGLIO
        Route::resource('/project', ProjectController::class);

        Route::resource("/type", TypeController::class);

        Route::resource("/lenguage", LanguageController::class);
    });

require __DIR__ . '/auth.php';
