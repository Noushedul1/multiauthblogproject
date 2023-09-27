<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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

// start for front end
Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index');
    Route::get('/post_details/{id}','postDetails')->name('front.post_detials');
    Route::post('/comment/{id})','comment')->name('front.comment.store');

    Route::get('/filter_by_category/{id}','filterCategory')->name('front.filter_by_category');

    Route::get('/contact','contact')->name('front.contact')->middleware('auth');
    Route::post('/contact/store','contactStore')->name('front.contact.store');

    Route::get('/comment_likes/{id}','commentLikes')->name('front.comment.like');
    Route::get('/comment_unlikes/{id}','commentUnlikes')->name('front.comment.unlike');

});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// end for frontednd

// start for admin
Route::controller(AdminController::class)->group(function() {
    Route::get('admin/login','login')->name('admin.login');
    Route::post('admin/store','store')->name('admin.store');
    Route::get('admin/register','register')->name('admin.register');
    Route::post('admin/register/store','registerStore')->name('admin.register.store');
    Route::post('admin/logout','logout')->name('admin.logout');
});
Route::controller(DashboardController::class)->middleware('admin')->group(function(){
    Route::get('admin/dashboard','index')->name('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function(){
    Route::resource('category', CategoryController::class);

    Route::resource('post',PostController::class);
    Route::get('post_status/{id}',[PostController::class,'postStatus'])->name('postStatus');
});

// end for admin

