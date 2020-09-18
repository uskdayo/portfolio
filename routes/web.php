<?php
Route::get('/blogs', 'BlogController@index')->name('blog.list');

Route::get('/', function () {
    return redirect('/blogs');
});
