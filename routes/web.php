<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ExpertiesController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\CertificatesController;
use App\Http\Controllers\Products;
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

Route::get('/', [App\Http\Controllers\Home::class, 'index'] );
Route::get('/products',[Products::class, 'index'] );
Route::get('/products/{id}',[Products::class,'product']);
Route::get('/company',[App\Http\Controllers\CompanyController::class,'index']);
Route::get('/certificates',[App\Http\Controllers\CertificatesController::class,'index']);

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/admin', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::controller(SliderController::class)->group(function () {
            Route::get('slider','index')->name('slider');
            Route::get('slider/add','add')->name('slider.add');
            Route::post('slider/store','store')->name('slider.store');
        });

        Route::controller(ProductController::class)->group(function() {
            Route::get('product','index')->name('product');
            Route::get('product/add','add')->name('product.add');
            Route::post('product/store','store')->name('product.store');
            Route::get('product/delete/{id}','delete')->name('product.delete');
            Route::get('product/edit/{id}','edit')->name('product.edit');
            Route::post('product/update/{id}','update')->name('product.update');
        });

        Route::controller(ExpertiesController::class)->group(function() {
            Route::get('experties','index')->name('experties');
            Route::get('experties/add','add')->name('experties.add');
            Route::post('experties/store','store')->name('experties.store');
            Route::get('experties/delete/{id}','delete')->name('experties.delete');
            Route::get('experties/edit/{id}','edit')->name('experties.edit');
            Route::post('experties/update/{id}','update')->name('experties.update');
        });

        Route::controller(CompanyController::class)->group(function() {
            Route::get('company','index')->name('company');
            Route::get('company/add','add')->name('company.add');
            Route::post('company/store','store')->name('company.store');
            Route::get('company/delete/{id}','delete')->name('company.delete');
            Route::get('company/edit/{id}','edit')->name('company.edit');
            Route::post('company/update/{id}','update')->name('company.update');
        });

        Route::controller(CertificatesController::class)->group(function() {
            Route::get('certificates','index')->name('certificates');
            Route::get('certificates/add','add')->name('certificates.add');
            Route::post('certificates/store','store')->name('certificates.store');
            Route::get('certificates/delete/{id}','delete')->name('certificates.delete');
            Route::get('certificates/edit/{id}','edit')->name('certificates.edit');
            Route::post('certificates/update/{id}','update')->name('certificates.update');
        });
    });

    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
    Route::get('map', function () {
        return view('pages.maps');
    })->name('map');
    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');
    Route::get('table-list', function () {
        return view('pages.tables');
    })->name('table');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
