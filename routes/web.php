<?php


use App\Http\Controllers\Admin\AdminWordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\FlashCardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;

// Главная страница и страницы с деталями слов
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/detail/{id}', [HomeController::class, 'show'])->name('home.show');
Route::get('/level/{id}', [HomeController::class, 'level'])->name('home.level');
Route::get('/test', [HomeController::class, 'test'])->name('home.test');

Route::get('/userprofile', function () {
    return view('layouts.userprofile');
})->name('user.profile123');

// искать слова
Route::get('/search', [HomeController::class, 'search'])->name('home.search');


// Пользовательские маршруты
Route::middleware(['auth', 'hasrole:user'])->group(function () {
    Route::get('/flashcard/{id}', [FlashCardController::class, 'index'])->name('user.flashcard');
    Route::post('/flashcard/{id}/check', [FlashCardController::class, 'check'])->name('flashcard.check');
    Route::post('/flashcard', [FlashCardController::class, 'reset'])->name('flashcard.reset');
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::get('/profile/words', [UserController::class, 'words'])->name('user.words');
    Route::get('/profile/listUsers', [UserController::class, 'users'])->name('user.listUsers');
    Route::put('/profile/edit', [UserController::class, 'editDataOfUser'])->name('user.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/favourite/{id}', [UserController::class, 'save'])->name('user.save');
    Route::get('/favourites', [UserController::class, 'favourites'])->name('user.favourites');
    Route::post('/favourites', [UserController::class, 'clearFavourites'])->name('user.clearFavourites');
});


// Админские маршруты
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

// Аутентификация
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'loginPost'])->name('auth.loginPost');
Route::post('/register', [RegisterController::class, 'registerPost'])->name('auth.registerPost');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');