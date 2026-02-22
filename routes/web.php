<?php


use App\Http\Controllers\Admin\AdminWordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\FlashCardController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/detail/{id}', [HomeController::class, 'show'])->name('home.show');
Route::get('/level/{id}', [HomeController::class, 'level'])->name('home.level');

Route::get('/test', [HomeController::class, 'test'])->name('home.test');
Route::post('/test', [HomeController::class, 'check'])->name('home.checkTest');


//user

Route::middleware(['auth', 'hasrole:user'])->group(function () {
    Route::get('/flashcard/{id}', [FlashCardController::class, 'index'])->name('user.flashcard');

    Route::post('/flashcard/{id}/check', [FlashCardController::class, 'check'])->name('flashcard.check');
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::get('/profile/words', [UserController::class, 'words'])->name('user.words');
    Route::get('/profile/listUsers', [UserController::class, 'users'])->name('user.listUsers');
    //save word
    Route::post('/save/{id}', [UserController::class, 'save'])->name('user.save');
});

//admin
Route::middleware(['auth', 'hasrole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/words', [AdminWordController::class, 'words'])->name('admin.words');
    Route::get('/admin/trashedwords', [AdminWordController::class, 'trashedWords'])->name('admin.trashedWords');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/detail/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/detail/{id}/update', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/detail/{id}/delete', [AdminController::class, 'destroy'])->name('admin.destroy');

});

//auth
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/registr', [RegistrController::class, 'registr'])->name('auth.registr');
Route::post('/login', [LoginController::class, 'loginPost'])->name('auth.loginPost');
Route::post('/registr', [RegistrController::class, 'registrPost'])->name('auth.registrPost');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');