<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('blog', function () {
    //$posts = auth()->user()->usersCoolPosts()->latest()-> get(); 
    //$posts = Post::where('user_id', auth()->id())->get();
    return view('blog');
});

Route::get('viewpost', function () {
    //$posts = auth()->user()->usersCoolPosts()->latest()-> get(); 
    //$posts = Post::where('user_id', auth()->id())->get();
    return view('viewpost');
});

Route::get('/', function () {
    //$posts = auth()->user()->usersCoolPosts()->latest()-> get(); 
    $posts = Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


//blog post related route
Route::post('/create-post', [PostController::class, 'createPost'])->name("create-post");
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen'])->name("create-post");
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
