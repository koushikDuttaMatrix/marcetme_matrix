<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//For Front Redirection
//Route::match(['get', 'post'],'auth/login', 'Auth\AuthController@getLogin');
Route::get('get-register','Auth\AuthController@getRegister');
//Route::match(['get','post'],'user-register','UserController@registration');
Route::get('user-login','UserController@getLogin');
Route::match(['get','post'],'auth-login','UserController@getLoginUser'); // for login view and post
Route::get('user-logout','UserController@getLogout');
Route::match(['get','post'],'user-register','UserController@register');
Route::match(['get','post'],'change-state','BusinessController@getStates');
Route::match(['get','post'],'change-city','BusinessController@getCites');


Route::match(['get','post'],'change-cit','BusinessController@getC');

Route::match(['get', 'post'],'business-detail/{id}/{title}', 'BusinessController@details');
Route::match(['get', 'post'],'user-business-detail/{categoryId}/{categoryName}','BusinessController@getBusinessByCategory');

// cms route define
Route::match(['get', 'post'],'about-us/{id}','BlogController@getCms');
Route::match(['get', 'post'],'services/{id}','BlogController@getCms');
Route::match(['get', 'post'],'family-and-work/{id}','BlogController@getCms');
Route::match(['get', 'post'],'contact-us','BlogController@contactUs');
Route::match(['get', 'post'],'talked-about-today/{id}','BlogController@getCms');
Route::match(['get', 'post'],'business-success','SuccessController@getBusinessSuccess');

// cms route define

//////////////////////////////////////////////
//Middleware protection for auth filter 
Route::group(['middleware' => 'auth'], function () {

Route::match(['get', 'post'],'user-dashboard','UserController@boxes');
Route::match(['get','post'],'user-business','BusinessController@getBusiness');
Route::match(['get', 'post'],'edit-user','UserController@editUser');
Route::match(['get','post'],'view-business','BusinessController@viewBusiness');
Route::match(['get', 'post'],'add-blog','BlogController@addBlog');
Route::match(['get', 'post'],'manage-blogs','BlogController@manageBlog');
Route::match(['get', 'post'],'edit-blog/{id}','BlogController@editBlog');
Route::match(['get', 'post'],'comment','UserCommentController@create');
Route::match(['get', 'post'],'comment-article','UserCommentController@createArticle');
Route::match(['get', 'post'],'edit-business','BusinessController@edit');
Route::match(['get', 'post'],'deleteBusinessImage','BusinessController@destroy');

       });
Route::match(['get','post'],'search-product','BusinessController@searchProduct');
Route::match(['get','post'],'advance-search','BusinessController@advanceSearch');
Route::get('facebook-login','AuthController@redirectToFacebook');
Route::get('auth-facebook-callback', 'AuthController@handleProviderCallback');
Route::get('google-login','AuthController@redirectToGoogle');
Route::get('auth-google-callback', 'AuthController@handleProviderCallbackGoogle');
Route::get('createCaptcha', 'UserController@createCaptcha');

/////////////////////////////////////////////
//Middleware protection for auth filter 


// For admin redirection
// delete route start
Route::get('admin/delete-category', 'admin\CategoryController@remove');
Route::get('admin/delete-blog', 'admin\BlogController@remove');
Route::get('admin/delete-cms', 'admin\CmsController@remove');
Route::get('admin/delete-article', 'admin\ArticleController@remove');
Route::get('admin/delete-success', 'admin\BusinessSuccessController@remove');
// delete route end
Route::get('admin/', 'admin\HomeController@index');
Route::get('admin/home', 'admin\HomeController@index');
Route::match(['get', 'post'],'admin/auth/login', 'admin\Auth\AuthController@login');
Route::get('admin/auth/logout', 'admin\Auth\AuthController@getLogout');
Route::get('admin/userdetails/{id}', 'admin\UserController@showProfile');
Route::get('admin/cms', 'admin\CmsController@index');
Route::match(['get', 'post'],'admin/cms/add', 'admin\CmsController@add');
Route::match(['get', 'post'],'admin/cms/edit/{id}', 'admin\CmsController@edit');

Route::get('admin/successes', 'admin\BusinessSuccessController@index');
Route::match(['get', 'post'],'admin/success/add', 'admin\BusinessSuccessController@add');
Route::match(['get', 'post'],'admin/success/edit/{id}', 'admin\BusinessSuccessController@edit');

Route::get('admin/articles', 'admin\ArticleController@index');
Route::match(['get', 'post'],'admin/article/add', 'admin\ArticleController@add');
Route::match(['get', 'post'],'admin/article/edit/{id}', 'admin\ArticleController@edit');

Route::get('admin/blogs', 'admin\BlogController@index');
Route::match(['get', 'post'],'admin/blog/add', 'admin\BlogController@add');
Route::match(['get', 'post'],'admin/blog/edit/{id}', 'admin\BlogController@edit');

Route::get('admin/category', 'admin\CategoryController@index');
Route::match(['get', 'post'],'admin/category/add', 'admin\CategoryController@add');
Route::match(['get', 'post'],'admin/category/edit/{id}', 'admin\CategoryController@edit');

Route::get('admin/users', 'admin\UserController@index');
Route::match(['get', 'post'],'admin/user/add', 'admin\UserController@add');
Route::match(['get', 'post'],'admin/user/edit/{id}', 'admin\UserController@edit');


Route::match(['get', 'post'],'auth/registration', 'Auth\AuthController@registration');
Route::match(['get', 'post'],'user/registration', 'UserController@registration');

Route::get('articles', 'ArticleController@index');
Route::get('blogs', 'BlogController@index');
Route::match(['get', 'post'],'article/{id}/{name}', 'ArticleController@details');
Route::match(['get', 'post'],'blog/{id}/{name}', 'BlogController@details');
/*********************Add new *******************/
//Route::get('about-us', 'CmsController@about_us');