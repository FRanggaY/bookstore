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


Route::get('/login', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::middleware(['auth','cekakses:admin'])->group(function () {

    Route::get('/inputdistributor', 'AdminController@indexinputdistributor')->name('indexinputdistributor');
    Route::post('/inputdistributor', 'AdminController@storedistributor')->name('storedistributor');
    Route::get('/inputdistributor/{disid}/edit' , 'AdminController@editdistributor');
    Route::post('/inputdistributor/{disid}/update' , 'AdminController@updatedistributor');
    Route::get('/inputdistributor/find' , 'AdminController@finddistributor')->name('finddistributor');

    Route::get('/inputdistributor/{disid}/delete' , 'AdminController@destroydistributor');

    Route::get('/inputbuku', 'AdminController@indexinputbuku')->name('indexinputbuku');
    Route::post('/inputbuku', 'AdminController@storebuku')->name('storebuku');
    Route::get('/inputbuku/{bookid}/edit' , 'AdminController@editbook');
    Route::post('/inputbuku/{bookid}/update' , 'AdminController@updatebook');
    Route::get('/inputbuku/find' , 'AdminController@findbook')->name('findbook');

    Route::get('/inputbuku/{bookid}/delete' , 'AdminController@destroybook');

    Route::get('/inputpasokbuku', 'AdminController@indextambahpasok')->name('indextambahpasok');
});

Route::middleware(['auth','cekakses:kasir'])->group(function () {

    Route::get('/penjualan', 'KasirController@indexformshop')->name('indexformshop');
    Route::get('/penjualan/{bukuid}/edit', 'KasirController@editformshop');
    Route::post('/penjualan/update', 'KasirController@updateformshop')->name('updateformshop');
});

Route::middleware(['auth','cekakses:manager'])->group(function () {

    Route::get('/tambahakun', 'ManagerController@indexaddaccount')->name('indexaddaccount');
    Route::post('/tambahakun', 'ManagerController@storeaccount')->name('storeaccount');
    Route::get('/profil', 'ManagerController@editprofile')->name('editprofile');
    Route::post('/profil', 'ManagerController@updateprofile')->name('updateprofile');
});

Route::middleware(['auth','cekakses:kasir,manager'])->group(function () {
    Route::get('/formcetakfaktur', 'LaporanController@indexfilterformbook')->name('indexfilterformbook');
    Route::get('/formcetakfaktur/show/', 'LaporanController@showfilterformbook')->name('showfilterformbook');
    Route::get('/semuapenjualan', 'LaporanController@indexallformshop')->name('indexallformshop');
    Route::get('/penjualanpertanggal', 'LaporanController@indexfilterdateformbook')->name('indexfilterdateformbook');
    Route::get('/penjualanpertanggal/show/', 'LaporanController@showfilterdateformbook')->name('showfilterdateformbook');
});

Route::middleware(['auth','cekakses:admin,manager'])->group(function () {
    Route::get('/semuadatabuku', 'LaporanController@indexalldatabook')->name('indexalldatabook');
    Route::get('/filterpenulis', 'LaporanController@indexfilterauthorbook')->name('indexfilterauthorbook');
    Route::get('/filterpenulis/show/', 'LaporanController@showfilterpenulis')->name('showfilterpenulis');
    Route::get('/bukuseringterjual', 'LaporanController@indexbookoftensold')->name('indexbookoftensold');
    Route::get('/bukutidakterjual', 'LaporanController@indexbooknotsold')->name('indexbooknotsold');
    Route::get('/pasokbuku', 'LaporanController@indexsupplierbook')->name('indexsupplierbook');
    Route::get('/filterpasokbuku', 'LaporanController@indexfiltersupplierbook')->name('indexfiltersupplierbook');
    Route::get('/filterpasokbuku/show/', 'LaporanController@showfiltersupplierbook')->name('showfiltersupplierbook');
});

Route::middleware(['auth','cekakses:kasir,admin,manager'])->group(function () {

    Route::get('/index', 'IndexController@index');
    Route::get('/change-password', 'LoginController@changepassword')->name('change-password');
    Route::post('/update-password', 'LoginController@updatepassword')->name('update-password');
});
