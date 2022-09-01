<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DBRelationController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//importing the controller:


Route::get('/', function () {       //Route for home page
    return view('home');
});

Route::get('about', function () {   //Route for about page
    return view('about');
});

Route::get('contact', function () {  //Route for contact page
    return view('contact');
});

Route::get('/', [DBRelationController::class, 'index']);  //route for index function

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts  //passing all the related posts of a particular category to the welcome view

    ]);
});


//below is the route to view post when clicked:
Route::get('/post/{post:id}', [PostController::class, 'show']);
//Route::resource('posts',PostController::class)->except(['update','index','delete','edit']);


Route::post('posts/{post:id}/comments', [PostCommentsController::class, 'store'])->name('comments');

Route::POST('/contact/submit', [ContactUsController::class, 'store']);

//below is the route for posts related to a tag
Route::get('/tags/{tag:slug}', function (Tag $tag) {
    return view('posts', [
        'posts' => $tag->posts,  //passing all the related posts of a particular category to the welcome view


    ]);
});

//route for publish post:
Route::get('/publish', [PostController::class, 'create'])->name('publish');


Route::Post('/publish', [PostController::class, 'store'])->middleware('admin');

//route to delete comment:
Route::get('/delete/{id}', [PostCommentsController::class, 'delete']);

//route for Register page
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');//Route for register page
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');//Route for register page

//below is the route for posts related to a User/Author
Route::get('/author/{user:id}', function (User $user) {
    return view('posts', [
        'posts' => $user->posts  //passing all the related posts of a particular category to the welcome view

    ]);
});

//route to logout the user:
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

//route for login page
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
