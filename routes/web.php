<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $posts = Post::latest()->where('is_featured', true);
    return view("blog.home", [
        'title' => 'Featured',
        'posts' => $posts->paginate(7),
       
    ]);
});


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/registers',[RegisterController::class,'index'])->middleware('guest');
Route::post('/registers',[RegisterController::class,'store']);
Route::get('/registers/edit',[RegisterController::class,'edit'])->middleware('auth');
Route::post('/registers/register/{user:username}',[RegisterController::class,'update']);

Route::get('/dashboard',function ()
{  
    $posts = Post::all()-> where('user_id', auth()->user()->id) ;
   $gender="female";
        if(auth()->user()->gender == 1){
            $gender= "male";
        }
    return view('dashboard.dashboard',[
        'total' =>$posts->count(),
         'gender' => $gender
    ]);
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');