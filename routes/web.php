<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articles', function(){
    $articles=Article::all();
    return view('pages.articles',compact('articles'));
})->middleware(['RoleVerification:1,2,3,4'])->name('articles');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['RoleVerification:1,2'])->name('dashboard');

Route::resource('articlesCRUD', ArticleController::class, [
    'names' => [
        'index' => 'articlesCRUD'
        ]
    ])->middleware(['RoleVerification:1,2']);

Route::get('users', function(){
    $users=User::all();
    return view('pages.back.users',compact('users'));
})->middleware(['RoleVerification:1'])->name('users');

require __DIR__.'/auth.php';
