<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
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

//Route for insert operation to database.
Route::get('/insert',function(){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'PHP','body'=>'lorem ipsum']);
    $user->posts()->save($post);

});

//Route for read operation to database.
Route::get('/read',function(){
    $user = User::findOrFail(1);
    foreach($user->posts as $post) {
        echo $post->title;
    }
});

Route::get('/update',function(){
    $user = User::find(1);
    $user->posts()->whereId(1)->update(['title'=>'I love laravel','body'=>'Awesome']);
});
