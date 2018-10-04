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

// Show list cats
Route::get('/cats', function () {
    $cats = Furbook\Cat::all();
    //dd($cats);
    return view('cats.index')->with('cats', $cats);
})->name('cat.index');

// Show list cats belong to breed
Route::get('/cats/breeds/{name}', function ($name) {
    $breed = Furbook\Breed::where('name', $name)
        ->first();
    $cats = $breed->cats;
    //dd($cats);
    return view('cats.index', compact('breed', 'cats'));
})->name('cat.breed');

// Show detail of cat
Route::get('/cats/{id}', function ($id) {
    return 'Show detail of cat #' . $id;
})->name('cat.show')->where('id', '[0-9]+');

// Show form create cat
Route::get('/cats/create', function () {
    return 'Show form create cat';
})->name('cat.create');

// Insert new cat
Route::post('/cats', function () {
    return 'Insert new cat';
})->name('cat.store');

// Show form edit cat
Route::get('/cats/{id}/edit', function ($id) {
    return 'Show form edit cat #' . $id;
})->name('cat.edit');

// Update cat
Route::put('/cats', function () {
    return 'Update cat';
})->name('cat.update');

// Delete cat
Route::delete('/cats/{id}', function ($id) {
    return 'Delete cat #' . $id;
})->name('cat.destroy');

// Test
Route::get('test', 'TestController@_is_last_weekday_of_month');