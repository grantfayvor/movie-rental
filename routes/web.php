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

use Illuminate\Http\Request;

// use Auth;


//admin view
Route::get('/admin/dashboard', 'MainController@adminDashboard')->name('admin')->middleware('auth', 'admin');
Route::get('/admin/add-movie', 'MainController@addMovie')->middleware('auth', 'admin');
Route::get('/admin/add-category', 'MainController@addCategory')->middleware('auth', 'admin');
Route::get('/admin/view-movies', 'MainController@viewMovies')->middleware('auth', 'admin');
Route::get('/admin/view-categories', 'MainController@viewCategoriesAsList')->middleware('auth', 'admin');
Route::get('/admin/view-movies-list', 'MainController@viewMoviesAsList')->middleware('auth', 'admin');
Route::get('/admin/view-sales-list', 'MainController@viewSalesAsList')->middleware('auth', 'admin');
Route::get('/admin/view-users', 'MainController@viewUsersAsList')->middleware('auth', 'admin');

//user view
Route::get('/', 'MainController@index');
Route::get('/cart', 'MainController@Cart');
Route::get('/checkout', 'MainController@checkout')->middleware('auth');
Route::get('/logout', 'UserController@logout')->middleware('auth');
Route::get('/home', 'MainController@home');
Route::get('/profile', 'MainController@userProfile')->middleware('auth');
Route::get('/payment/success', 'MainController@paymentSuccessView')->middleware('auth');
Route::get('/payment/failure', 'MainController@paymentFailureView')->middleware('auth');
Route::get('/contact-us', 'MainController@contactUsView');
Route::get('/company-info', 'MainController@companyInfoView');
Route::get('/privacy-policy', 'MainController@privacyPolicyView');
Route::get('/refund-policy', 'MainController@refundPolicyView');
Route::get('/terms-of-use', 'MainController@termsOfUseView');

//contact-us
Route::post('/contact-us', 'ContactUsController@sendMail')->name('contact-us');

Auth::routes();

//Category apis
Route::post('/api/category/save', 'CategoryController@saveCategory')->middleware('auth', 'admin');
Route::get('/api/categories', 'CategoryController@getAllCategories')->middleware('auth', 'admin');
Route::delete('/api/category/delete/{id}', 'CategoryController@deleteCategory')->middleware('auth', 'admin');
Route::get('/api/categories/count', 'CategoryController@countCategories')->middleware('auth', 'admin');

//Movie apis
Route::get('/api/movies', 'MovieController@findAllMovies');
Route::post('/api/movie/save', 'MovieController@saveMovie')->middleware('auth', 'admin');
Route::post('/api/movie/update', 'MovieController@updateMovie')->middleware('auth', 'admin');
Route::get('/api/movie/search/{param}', 'MovieController@search');
Route::get('/api/movies/count', 'MovieController@countMovies')->middleware('auth', 'admin');
Route::delete('/api/movie/delete/{id}', 'MovieController@deleteMovie')->middleware('auth', 'admin');
Route::get('/api/movies/status/{status}', 'MovieController@findMoviesByStatus');
Route::get('/api/movies/find', 'MovieController@findMoviesByCategory');
Route::get('/api/movies/location/{location}', 'MovieController@getByTheatreLocation')->middleware('auth');

Route::get('/movie/image', 'MainController@viewMovieImage');

//Cart apis
Route::post('/api/cart/add', 'CartController@addToCart');
Route::get('/api/cart/user', 'CartController@getUserCart');
Route::put('/api/cart/update', 'CartController@updateCart');
Route::get('/api/cart/one/{rowId}', 'CartController@getCartItem');
Route::delete('/api/cart/delete/{rowId}', 'CartController@removeFromCart');
Route::get('/api/cart/destroy', 'CartController@destroyCart');
Route::post('/api/cart/save', 'CartController@storeCartData');
Route::get('/api/cart/restore', 'CartController@restoreCart');
Route::get('/api/cart/count', 'CartController@getCountOfItems');

//Sale apis
Route::get('/api/sales', 'SaleController@getAllSales')->middleware('auth', 'admin');
Route::get('/api/sales/count', 'SaleController@getSaleCount')->middleware('auth', 'admin');
Route::get('/api/sales/search/{param}', 'SaleController@search')->middleware('auth', 'admin');

//User apis
Route::post('/api/user/save', 'UserController@saveUser');
Route::post('/api/user/authenticate', 'UserController@authenticateUser');
Route::get('/api/users/count', 'UserController@countUsers')->middleware('auth', 'admin');
Route::get('/api/user', 'UserController@getCurrentUser')->middleware('auth');
Route::put('/api/user/update/{id}', 'UserController@updateUser')->middleware('auth');
Route::put('/api/user/admin/{id}', 'UserController@makeUserAdmin')->middleware('auth', 'admin');
Route::get('/api/users', 'UserController@findAllUsers')->middleware('auth', 'admin');
Route::delete('/api/user/delete', 'UserController@deleteUser')->middleware('auth', 'admin');
Route::get('/api/users/search/{param}', 'UserController@search')->middleware('auth', 'admin');

Route::post('/api/address/save', 'UserController@addAdress');
Route::get('/api/address', 'UserController@getAddress');

//Payment gateway
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay')->middleware('auth');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback')->middleware('auth');
Route::post('/payment/storeDetails', 'PaymentController@storePaymentDetails')->middleware('auth');
Route::get('/paystack/reference', 'PaymentController@getTransactionReference')->middleware('auth');

Route::post('/review', 'ReviewController@create')->middleware('auth');
Route::post('/rating', 'RatingController@create')->middleware('auth');
Route::post('/theatre', 'TheatreController@create')->middleware('auth');
Route::get('/theatre', 'TheatreController@getAll')->middleware('auth');
Route::get('/theatre/distinct', 'TheatreController@getDistinctLocations');