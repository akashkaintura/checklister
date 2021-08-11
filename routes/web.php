<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\User\ChecklistController as UserChecklistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'welcome');

Auth::routes();

Route::get('/home', [Home::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'save_last_action_timestamp']], function () {
    // Universal Controllers
    Route::get('welcome', [ControllersPageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [ControllersPageController::class, 'consultation'])->name('consultation');
    Route::get('checklists/{checklist}', [UserChecklistController::class, 'show'])
        ->name('users.checklists.show');
    Route::get('tasklist/{list_type}', [UserChecklistController::class, 'tasklist'])
        ->name('user.tasklist');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::resource('pages', PageController::class)
            ->only(['edit', 'update']);
        Route::resource('checklist_groups', ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', ChecklistController::class);
        Route::resource('checklists.tasks', TaskController::class);

        Route::post('users/{user}/toggle_free_access', [UserController::class, 'toggle_free_access'])
        ->name('users.toggle_free_access');
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::post('images', [ImageController::class, 'store'])->name('images.store');
    });
});
