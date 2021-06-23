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
/*
|--------------------------------------------------------------------------
| Welcome
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Login (login,process,logout)
|--------------------------------------------------------------------------
*/
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');
/*
|--------------------------------------------------------------------------
| Page for access=admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','cekakses:admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | input distributor
    |--------------------------------------------------------------------------
    */
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

    Route::get('/inputpasokbuku', 'AdminController@indexinputpasok')->name('indexinputpasok');
    Route::get('/inputpasokbuku/tambah', 'AdminController@tambahinputpasok')->name('tambahinputpasok');
    Route::get('/inputpasokbuku/{bookid}/edit', 'AdminController@editpasok');
    Route::post('/inputpasokbuku/{bookid}/update', 'AdminController@updatepasok');
    Route::get('/inputpasokbuku/{bookid}/delete', 'AdminController@destroydpasok');
    Route::post('/inputpasokbuku', 'AdminController@storepasok')->name('storepasok');
});

Route::middleware(['auth','cekakses:kasir'])->group(function () {

    Route::get('/penjualan', 'KasirController@indexformshop')->name('indexformshop');
    Route::get('/penjualan/{bukuid}/edit', 'KasirController@editformshop');
    Route::get('/penjualan/{bukuid}/delete', 'KasirController@destroyformshop');
    Route::post('/penjualan/update', 'KasirController@updateformshop')->name('updateformshop');
    Route::post('/penjualan/tambah', 'KasirController@saveformshop')->name('saveformshop');
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
    Route::get('/semuapenjualan/cetak', 'LaporanController@printindexallformshop')->name('printindexallformshop');
    Route::get('/semuapenjualan/export', 'LaporanController@indexallformshopexport')->name('exportindexallformshop');
    Route::get('/penjualanpertanggal', 'LaporanController@indexfilterdateformbook')->name('indexfilterdateformbook');
    Route::get('/penjualanpertanggal/show/', 'LaporanController@showfilterdateformbook')->name('showfilterdateformbook');
    Route::get('/penjualanpertanggal/cetak/', 'LaporanController@printfilterdateformbook')->name('printfilterdateformbook');
});

Route::middleware(['auth','cekakses:admin,manager'])->group(function () {
    Route::get('/semuadatabuku', 'LaporanController@indexalldatabook')->name('indexalldatabook');
    Route::get('/semuadatabuku/cetak', 'LaporanController@printindexalldatabook')->name('printindexalldatabook');
    Route::get('/semuadatabuku/export', 'LaporanController@indexalldatabookexport')->name('exportsemuadatabuku');
    Route::get('/filterpenulis', 'LaporanController@indexfilterauthorbook')->name('indexfilterauthorbook');
    Route::get('/filterpenulis/show/', 'LaporanController@showfilterpenulis')->name('showfilterpenulis');
    Route::get('/bukuseringterjual', 'LaporanController@indexbookoftensold')->name('indexbookoftensold');
    Route::get('/bukuseringterjual/export', 'LaporanController@indexbookoftensoldexport')->name('exportdatabukubanyakterjual');
    Route::get('/bukutidakterjual', 'LaporanController@indexbooknotsold')->name('indexbooknotsold');
    Route::get('/bukutidakterjual/export', 'LaporanController@indexbooknotsoldexport')->name('exportdatabukutidakterjual');
    Route::get('/pasokbuku', 'LaporanController@indexsupplierbook')->name('indexsupplierbook');
    Route::get('/pasokbuku/show/', 'LaporanController@showsupplierbook')->name('showsupplierbook');
    Route::get('/pasokbuku/cetak/', 'LaporanController@printsupplierbook')->name('printsupplierbook');
    Route::get('/filterpasokbuku', 'LaporanController@indexfiltersupplierbook')->name('indexfiltersupplierbook');
    Route::get('/filterpasokbuku/show/', 'LaporanController@showfiltersupplierbook')->name('showfiltersupplierbook');
});

Route::middleware(['auth','cekakses:kasir,admin,manager'])->group(function () {

    Route::get('/index', 'IndexController@index');
    Route::get('/change-password', 'LoginController@changepassword')->name('change-password');
    Route::post('/update-password', 'LoginController@updatepassword')->name('update-password');
});
