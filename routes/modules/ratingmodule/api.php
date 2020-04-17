<?php

Route::group(['middleware' => ['jwt.auth']], function () {

    Route::post('/get-ratable-order', [
        'uses' => 'RatingController@getRatableOrder',
    ]);

    Route::post('/save-new-rating', [
        'uses' => 'RatingController@saveNewRating',
    ]);

    Route::post('/single-ratable-order', [
        'uses' => 'RatingController@singleRatableOrder',
    ]);

});
