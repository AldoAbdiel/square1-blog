<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome'); // welcome page

Route::group(['middleware' => 'auth'], function () {

    // PostController routes:
    Route::resource('posts', PostController::class)->only([
        'index', 'create', 'store'
    ]);

    // Import posts page:
    Route::group(['middleware' => 'role.admin'], function () {
        Route::resource('imports', App\Http\Controllers\ImportController::class)->only([
            'index', 'store'
        ]);
    });;
});

