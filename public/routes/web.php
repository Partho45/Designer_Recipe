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

use App\Http\Controllers\HomeController;

Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('recipe/{slug}', 'HomeController@details')->name('recipe.details');
Route::get('category/{id}', 'HomeController@categoryWisePost')->name('categoryWiseShow.recipe.details');
Route::get('recipes', 'HomeController@allRecipe')->name('recipe.allRecipe');

Route::get('search' , 'HomeController@search')->name('search'); 

Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');


Route::group([ 
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => [ 
        'auth', 'admin' ,'verified'
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('recipe','RecipeController');
    Route::get('pending/recipe','RecipeController@pending')->name('recipe.pending');
    Route::get('pending/approval/{id}','RecipeController@approval')->name('recipe.approve');

    Route::get('memberlist','MemberController@index')->name('memberlist.index');
    Route::delete('memberlist/{id}','MemberController@destroy')->name('member.destroy');

    Route::get('profile-info','SettingsController@index')->name('profile');
    Route::get('profile-info/edit','SettingsController@edit')->name('profile.edit');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');


    Route::get('subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('subscriber/{subscriber}','SubscriberController@deleteSubscriberFunction')->name('subscriber.destroy');
});

Route::group([ 
    'as' => 'member.', 
    'prefix' => 'member', 
    'namespace' => 'Member', 
    'middleware' => [ 
    'auth', 'member' , 'verified'
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('categories','DashboardController@categories')->name('categories');
    Route::resource('recipe','RecipeController');
    Route::get('pending/recipe','RecipeController@pending')->name('recipe.pending');
    
    Route::get('profile-info','SettingsController@index')->name('profile');
    Route::get('profile-info/edit','SettingsController@edit')->name('profile.edit');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
});


