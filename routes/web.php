<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;







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
Route::resource('article', ArticleController::class)->middleware('auth:sanctum');
Route::resource('article', ArticleController::class);



//Auth
Route::get('/auth/create', [AuthController::class, 'create']);
Route::post('/auth/signUp', [AuthController::class, 'signUp']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/signIn', [AuthController::class, 'customLogin']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

#Article Comment
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');


Route::get('/', [MainController::class, 'index']);
Route::get('/galery/{name}', [MainController::class, 'show']);


Route::get('/about', function () {
    return view('main/about');
});




Route::get('/contact', function(){
    $contact = [
        'name' => 'Polytech',
        'addres' => 'B.Semenovskay',
        'phone' => '8 (495) 423-2323',
        'email' => '@mospolytech.ru'
    ];
    return view('main/contact', ['contact' => $contact]);
});

//Сomments
Route::controller(CommentController::class)->middleware('auth:sanctum')->prefix('/comments')
        ->group(function(){
            Route::post('', 'store');
            Route::get('/{comment}/edit','edit');
            Route::post('/{comment}','update');
            Route::get('/{comment}/delete','delete');
        }
);