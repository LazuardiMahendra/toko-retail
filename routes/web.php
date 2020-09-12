<?php

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

// Route::get('/', function () {return view('welcome'); });

//PagesController
Route::get('/', 'PagesController@index');
Route::get('/login', 'PagesController@login');
Route::post('/login/action', 'PagesController@loginAction');
Route::get('/sign-out', 'PagesController@signOut');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/produk', 'PagesController@produk');

Route::get('/signup/add/{id}', 'PagesController@signup');
Route::post('/signup/add/post', 'PagesController@signupAddPost');

//Manager
Route::get('/manager', 'ManagerController@index');
Route::get('/manager/chart', 'ManagerController@chart');
Route::get('/manager/percent', 'ManagerController@percent');

//Member
Route::get('/member', 'MemberController@index');
Route::get('/member/listproduk', 'MemberController@listProduk');
Route::get('/member/cart', 'MemberController@cart');
Route::get('/member/cart/checkout/', 'MemberController@checkout');
Route::get('/member/cart/plus', 'MemberController@plus');
Route::get('/member/cart/minus', 'MemberController@minus');
Route::post('/member/listproduk/api/search-product', 'MemberController@apiSearchProduct');



//Employee
Route::get('/signout', 'EmployeeController@signOut');
Route::get('/employee', 'EmployeeController@index');
//Produk
//tampil
Route::get('/employee/produk', 'EmployeeController@produk');
//tambah
Route::get('/employee/produk/add/{id}', 'EmployeeController@ProdukAdd');
Route::post('/employee/produk/add/post', 'EmployeeController@ProdukAddPost');
//edit
Route::get('/employee/produk/edit/{id}', 'EmployeeController@ProdukEdit');
Route::post('/employee/produk/edit/post', 'EmployeeController@ProdukEditPost');
//delete
Route::get('/employee/produk/delete/{id}', 'EmployeeController@ProdukDelete');
//reporting
Route::get('/employee/preview', 'EmployeeController@previewPdf');
Route::get('/employee/print', 'EmployeeController@printPdf');
//Kategori
//tampil
Route::get('/employee/kategori', 'EmployeeController@kategori');
//tambah
Route::get('/employee/kategori/add/{id}', 'EmployeeController@KategoriAdd');
Route::post('/employee/kategori/add/post', 'EmployeeController@KategoriAddPost');
//edit
Route::get('/employee/kategori/edit/{id}', 'EmployeeController@KategoriEdit');
Route::post('/employee/kategori/edit/post', 'EmployeeController@KategoriEditPost');
//delete
Route::get('/employee/kategori/delete/{id}', 'EmployeeController@KategoriDelete');
//Supplier
//tampil
Route::get('/employee/supplier', 'EmployeeController@supplier');
//tambah
Route::get('/employee/supplier/add/{id}', 'EmployeeController@supplierAdd');
Route::post('/employee/supplier/add/post', 'EmployeeController@supplierAddPost');
//edit
Route::get('/employee/supplier/edit/{id}', 'EmployeeController@supplierEdit');
Route::post('/employee/supplier/edit/post', 'EmployeeController@supplierEditPost');
//delete
Route::get('/employee/supplier/delete/{id}', 'EmployeeController@supplierDelete');


//Diagram
Route::get('/api/manager/laporan-pendapatan', 'ApiManagerController@getLaporanPendapatan');
