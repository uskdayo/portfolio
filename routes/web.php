<?php
Route::get('/blogs', 'BlogController@index')->name('blog.list');
Route::get('/blog/new', 'BlogController@create')->name('blog.new');
Route::post('/blog', 'BlogController@store')->name('blog.store');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.detail');

Route::get('/', function () {
    return redirect('/blogs');
});
