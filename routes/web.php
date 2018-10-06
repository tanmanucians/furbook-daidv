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
    $cats = Furbook\Cat::orderBy('created_at', 'DESC')->get();
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
    $breeds = Furbook\Breed::pluck('name', 'id');
    //dd($breeds);
    return view('cats.create', compact('breeds'));
})->name('cat.create');

// Insert new cat
Route::post('/cats', function () {
    $validator = Validator::make(
        request()->all(),
        [
            'name'          => 'required|max:255',
            'date_of_birth' => 'required|date_format:"Y-m-d"',
            'breed_id'      => 'required|numeric',
        ],
        [
            'required'    => 'Trường :attribute là bắt buộc',
            'max'         => 'Trường :attribute tối đa là :max kí tự',
            'numeric'     => 'Trường bắt buộc :attribute là kiểu số nguyên',
            'date_format' => 'Trường :attribute format không đúng định dạng :format',
        ]
    );

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            //->with('errors', $validator)
            ->withInput();
    }

    $data = Request::all();
    Furbook\Cat::create($data);
    return redirect()
        ->route('cat.index');
})->name('cat.store');

// Show form edit cat
Route::get('/cats/{id}/edit', function ($id) {
    $breeds = Furbook\Breed::pluck('name', 'id');
    $cat = Furbook\Cat::find($id);
    //dd($cat);
    return view('cats.edit', compact('cat', 'breeds'));
})->name('cat.edit');

// Update cat
Route::put('/cats/{id}', function (CatRequest $request, $id) {
    $data = $request->all();
    $cat = Furbook\Cat::find($id);
    $cat->update($data);
    return redirect()
    ->route('cat.index');
})->name('cat.update');

// Delete cat
Route::delete('/cats/{id}', function ($id) {
    $cat = Furbook\Cat::find($id);
    $cat->delete();
    return redirect()
    ->route('cat.index');
})->name('cat.destroy');

// Test
Route::get('test', 'TestController@_is_last_weekday_of_month');