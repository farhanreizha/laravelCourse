<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OuterController::class, 'index']);

Route::controller(UsersController::class)->group(function () {
  Route::get('/login', 'login_form')->name('login_form');
  Route::post('/login', 'login_action')->name('login_action');
  Route::get('/register', 'register_form')->name('register_form');
  Route::post('/register', 'register_action')->name('register_action');
  Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
  Route::post('/logout', 'dashboard_logout')->name('dashboard_logout');
  Route::post('/article', 'article_delete_action')->name('article_delete_action');
  Route::post('/article/add', 'article_add_action')->name('article_add_action');
  Route::get('/article/edit/{id}', 'article_edit')->name('article_edit');
  Route::post('/article/edit', 'article_edit_action')->name('article_edit_action');
});

Route::controller(OuterController::class)->group(function () {
  Route::get('/', 'index')->name('home');
  Route::get('/article/{id}', 'article_detail')->name('article_detail');
});
