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

use Furbook\Http\Requests\CatRequest;

View::composer('partials.forms.cat', function ($view) {
    $view->breeds = Furbook\Breed::pluck('name', 'id');
});

Route::get('/', function () {
    /**
     * Test get query log
     */
    //DB::enableQueryLog();
    //$breed = Furbook\Breed::find(1);
    //dd(DB::getQueryLog());

    //$cat = Furbook\Cat::find(1);
    
    /**
     * Test data relation
     */
    //dd($breed->cats);
    //dd($cat->breed);
    return redirect('cats');
});

Route::resource('cats', 'CatController');

// Show list cats belong to breed
Route::get('/cats/breeds/{name}', ['uses' => 'CatController@breed', 'as' => 'cats.breed']);

// Test
Route::get('test', 'TestController@_is_last_weekday_of_month');