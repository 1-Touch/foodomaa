<?php

Route::group(['prefix' => 'admin/modules', 'middleware' => 'admin'], function () {
    Route::get('/ratings', 'RatingController@ratings')->name('admin.ratings');
    Route::get('/ratings/settings', 'RatingController@settings')->name('admin.ratingsSettings');
    Route::post('/ratings/settings/save', 'RatingController@updateSettings')->name('admin.updateSettings');
    Route::get('/ratings/edit/{id}', 'RatingController@editRating')->name('admin.editRating');
    Route::post('/ratings/save', 'RatingController@updateRating')->name('admin.updateRating');
});
