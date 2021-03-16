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

//Admin controller work + curd

Route::get('admin','AdminController@index');
Route::get('admin/category','AdminController@category');
Route::get('admin/course','AdminController@course');
Route::get('admin/banner','AdminController@banner');
Route::get('admin/navfoot','AdminController@navfoot');
Route::get('admin/learn','AdminController@learn');
Route::get('admin/ourteam','AdminController@ourteam');
Route::get('admin/placement','AdminController@placement');
Route::get('admin/intern','AdminController@intern');
Route::get('admin/contact','AdminController@contact');
Route::get('admin/contact_data','AdminController@contact_data');
//Addcategory Route work + curd

Route::post('addcategory/insert','CategoryController@insert');
Route::get('admin/category','CategoryController@display');
Route::get('addcategory/delete/{id}','CategoryController@delete');
Route::get('addcategory/edit/{id}','CategoryController@edit');
Route::post('addcategory/update','CategoryController@update');

//Addcourse Route work + curd
Route::post('addcourse/insert','CourseController@insert');
Route::get('admin/course','CourseController@display');
Route::get('addcourse/edit/{id}','CourseController@edit');
Route::post('addcourse/update','CourseController@update');
Route::get('addcourse/delete/{id}','CourseController@delete');

//our team route work + curd
Route::post('addourteam/insert','TeamController@insert');
Route::get('admin/ourteam','TeamController@display');
Route::get('addourteam/delete/{id}','TeamController@delete');
Route::get('addourteam/edit/{id}','TeamController@edit');
Route::post('addourteam/update','TeamController@update');

//Placement route work + curd
Route::post('addplacement/insert','PlacementController@insert');
Route::get('admin/placement','PlacementController@display');
Route::get('addplacement/delete/{id}','PlacementController@delete');
Route::get('addplacement/edit/{id}','PlacementController@edit');
Route::post('addplacement/update','PlacementController@update');
//Placement route work + curd
Route::post('addintern/insert','InternController@insert');
Route::get('admin/intern','InternController@display');
Route::get('addintern/delete/{id}','InternController@delete');
Route::get('addintern/edit/{id}','InternController@edit');
Route::post('addintern/update','InternController@update');

//Placement route work + curd
Route::post('addcontact/insert','ContactController@insert');
Route::get('admin/contact','ContactController@display');
Route::get('addcontact/delete/{id}','ContactController@delete');
Route::get('addcontact/edit/{id}','ContactController@edit');
Route::post('addcontact/update','ContactController@update');



//Frontend routes for pages
Route::get('index','FrontendController@index');
Route::get('courses','FrontendController@courses');
Route::get('course_detail/{id}','FrontendController@course_detail');
Route::get('category_courses/{id}','FrontendController@category_courses');
Route::get('signup','FrontendController@signup');
Route::get('front/login','FrontendController@login');
Route::post('addsignup/save','FrontendController@save');
Route::post('addlogin/dologin','FrontendController@dologin');
Route::get('goto_cart','FrontController@goto_cart');
Route::post('addtocart','FrontController@addtocart');
Route::get('team','FrontController@team');
Route::get('placement','FrontController@placement');
Route::get('intern','FrontController@intern');
Route::get('contact','FrontController@contact');
Route::post('front/addcontact/insert','FrontContactController@insert');


//Addbanner Route work + curd
Route::post('addbanner/insert','BannerController@insert');
Route::get('admin/banner','BannerController@display');
Route::get('addbanner/delete/{id}','BannerController@delete');
Route::get('addbanner/edit/{id}','BannerController@edit');
Route::post('addbanner/update','BannerController@update');

//Addnavfoot Route work + curd
Route::post('addnavfoot/insert','NavfootController@insert');
Route::get('admin/navfoot','NavfootController@display');
Route::get('addnavfoot/edit/{id}','NavfootController@edit');
Route::post('addnavfoot/update','NavfootController@update');
Route::get('addnavfoot/delete/{id}','NavfootController@delete');

//Addlearn Route work + curd
Route::post('addlearn/insert','LearnController@insert');
Route::get('admin/learn','LearnController@display');
Route::get('addlearn/delete/{id}','LearnController@delete');
Route::get('addlearn/edit/{id}','LearnController@edit');
Route::post('addlearn/update','LearnController@update');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
