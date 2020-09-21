<?php
Route::get('/blogs', 'BlogController@index')->name('blog.list');
Route::get('/blog/new', 'BlogController@create')->name('blog.new');
Route::post('/blog', 'BlogController@store')->name('blog.store');
Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
Route::post('/blog/update/{id}', 'BlogController@update')->name('blog.update');

Route::get('/blog/{id}', 'BlogController@show')->name('blog.detail');
Route::delete('/blog/{id}', 'BlogController@destroy')->name('blog.destroy');

Route::get('/', function () {
    return redirect('/blogs');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/items', 'ItemController@index')->name('items.index');
Route::get('/item/new', 'ItemController@create')->name('items.new');
Route::post('/item', 'ItemController@store')->name('items.store');
Route::get('/item/edit/{id}', 'ItemController@edit')->name('items.edit');
Route::post('/item/update/{id}', 'ItemController@update')->name('items.update');
Route::get('/item/{id}', 'ItemController@show')->name('items.show');
Route::delete('/item/{id}', 'ItemController@destroy')->name('items.destroy');