<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Frontend Routes
//Home
Route::get('/', 'Frontend\FrontendController@index')->name('index');

// Blogs
Route::get('/blogs', 'Frontend\BlogController@index')->name('blogs_index');
Route::get('/blogs/{slug}', 'Frontend\BlogController@show')->name('blogs_show');
Route::post('/blogs/comment/{slug}', 'Frontend\BlogController@storeComment')->name('blogs_store_comment');
Route::patch('/blogs/comment/{comment}', 'Frontend\BlogController@updateComment')->name('blogs_update_comment');
Route::delete('/blogs/comment/{comment}', 'Frontend\BlogController@destroyComment')->name('blogs_destroy_comment');

//About us
Route::get('/about-us', 'Frontend\AboutController@index')->name('about_index');

//Contact
Route::get('/contact-us', 'Frontend\ContactController@index')->name('contact_index');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard routes
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::resource('/roles', 'Admin\RoleController');
    Route::post('roles/{role}/permissions', 'Admin\RoleController@givePermission')->name('roles.permissions');
    Route::delete('roles/{role}/permissions{permission}', 'Admin\RoleController@revokePermission')->name('roles.permissions.revoke');

    Route::resource('/permissions', 'Admin\PermissionController');
    Route::post('permissions/{permission}/roles', 'Admin\PermissionController@assignRole')->name('permissions.roles');
    Route::delete('permissions/{permission}/roles/{role}', 'Admin\PermissionController@removeRole')->name('permissions.roles.remove');

    Route::resource('/users', 'Admin\UserController');
    Route::post('/users/{user}/roles', 'Admin\UserController@assignRole')->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', 'Admin\UserController@removeRole')->name('users.roles.remove');
    Route::post('/users/{user}/permissions', 'Admin\UserController@givePermission')->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', 'Admin\UserController@revokePermission')->name('users.permissions.revoke');

    // Settings
    Route::resource('settings', 'Admin\SettingController');

    //Blogs
    Route::resource('blogs', 'Admin\BlogsController');

    //About us
    Route::resource('about', 'Admin\AboutController');

    //Commnets
    Route::resource('comments', 'Admin\CommnetsController');
});
