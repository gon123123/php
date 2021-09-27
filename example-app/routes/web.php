<?php

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
Route::get('KhoaHoc', function () {
    return "Xin chao cac ban";
});
Route::get('MinhTuan/Laravel', function () {
    echo "chao mung den voi laravel";
});
Route::get('HoTen/{ten}', function ($ten) {
    echo "ten cua ban la {$ten}";
});
Route::get('Laravel/{ngay}', function ($ngay) {
    echo "Minh Tuan :" . $ngay;
})->where(['ngay' => '[a-zA-Z]+']);

// ding danh
Route::get('Route1', ['as' => 'MyRoute', function () {
    echo "Xin chao cac ban lan 2";
}]);
