<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| 路由都是无状态的，并且被分配了 api 中间件组。
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Resources\Picture as PictureResource;
use \App\Http\Controllers\PictureController as PictureController;

Route::get('/pictures', function () {
    return PictureResource::collection(PictureController::getHot());
});

Route::get('/pictures/description={content}', function ($content) {
    return PictureResource::collection(PictureController::getDescrip($content));
});

Route::get('/find/tag={tag}', function ($tag) {
    return PictureResource::collection(PictureController::getTags($tag));
});

Route::get('/picture/like', function () {
    return PictureResource::collection(PictureController::getLike());
});

//是否是点过赞的
Route::get('/pictures/pictureid={id}', function ($id) {
    return PictureController::getIsLiked($id);
});

//点赞or取消
Route::post('/like/picture', function (Request $request) {
    return PictureController::like($request);
});

use App\Http\Resources\User as UserResource;
use \App\Http\Controllers\UserController as UserController;

Route::post('/user/signup', function (Request $request) {
    return new UserResource(UserController::create($request));
});

Route::post('/user/signin', function (Request $request) {
    return new UserResource(UserController::verify($request));
});
