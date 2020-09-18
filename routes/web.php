<?php
Route::get('/blogs', 'BlogController@index')->name('blog.list');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.detail');

Route::get('/', function () {
    return redirect('/blogs');
});
