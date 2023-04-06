<?php

use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DestroyController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;

use App\Http\Controllers\FromController;
use App\Http\Controllers\Personal\Main\IndexController as PersonalIndexController;
use App\Http\Controllers\Personal\Liked\IndexController as LikedIndexController;
use App\Http\Controllers\Personal\Liked\DeleteController as LikedDeleteController;
use App\Http\Controllers\Personal\Comment\IndexController as CommentIndexController;
use App\Http\Controllers\Personal\Comment\EditController as CommentEditController;
use App\Http\Controllers\Personal\Comment\UpdateController as CommentUpdateController;
use App\Http\Controllers\Personal\Comment\DeleteController as CommentDeleteController;
use App\Http\Controllers\Personal\Comment\CreateController as CommentCreateController;

use App\Http\Controllers\Post\Comment\StoreController as CommentStoreController;
use App\Http\Controllers\Post\Like\StoreController as LikeStoreController;

use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\DestroyController as TagDestroyController;
use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
use App\Http\Controllers\Admin\Main\IndexController as MainIndexController;

use App\Http\Controllers\Admin\User\CreateController as UserCreateController;
use App\Http\Controllers\Admin\User\DestroyController as UserDestroyController;
use App\Http\Controllers\Admin\User\EditController as UserEditController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\User\StoreController as UserStoreController;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdateController;

use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\DestroyController as PostDestroyController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;


use App\Http\Controllers\Post\IndexController as IndexPostController;
use App\Http\Controllers\Post\ShowController as ShowPostController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
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
Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', IndexPostController::class)->name('post.index');
    Route::get('/{post}', ShowPostController::class)->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function (){
        Route::post('/', CommentStoreController::class)->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function (){
        Route::post('/', LikeStoreController::class)->name('post.like.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', PersonalIndexController::class)->name('personal.main');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', LikedIndexController::class)->name('personal.liked.index');
        Route::delete('/{post}', LikedDeleteController::class)->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', CommentIndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', CommentEditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', CommentUpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', CommentDeleteController::class)->name('personal.comment.delete');
        Route::get('/create', CommentCreateController::class)->name('personal.comment.create');


    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function (){
        Route::get('/', CategoryIndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DestroyController::class)->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function (){
        Route::get('/', TagIndexController::class)->name('admin.tag.index');
        Route::get('/create', TagCreateController::class)->name('admin.tag.create');
        Route::post('/', TagStoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', TagShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', TagEditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', TagUpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', TagDestroyController::class)->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function (){
        Route::get('/', PostIndexController::class)->name('admin.post.index');
        Route::get('/create', PostCreateController::class)->name('admin.post.create');
        Route::post('/', PostStoreController::class)->name('admin.post.store');
        Route::get('/{post}', PostShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', PostEditController::class)->name('admin.post.edit');
        Route::patch('/{post}', PostUpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', PostDestroyController::class)->name('admin.post.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function (){
        Route::get('/', UserIndexController::class)->name('admin.user.index');
        Route::get('/create', UserCreateController::class)->name('admin.user.create');
        Route::post('/', UserStoreController::class)->name('admin.user.store');
        Route::get('/{user}', UserShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', UserEditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UserUpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', UserDestroyController::class)->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', MainIndexController::class)->name('admin.main');
    });

});
Route::get('auth/google', [SocialController::class, 'googleRedirect'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle']);

Route::get('display-from', [FromController::class, 'index']);

Auth::routes(['verify' => true]);

