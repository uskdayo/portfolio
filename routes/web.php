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
