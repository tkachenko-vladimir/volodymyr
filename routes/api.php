<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Translators
    Route::post('translators/media', 'TranslatorsApiController@storeMedia')->name('translators.storeMedia');
    Route::apiResource('translators', 'TranslatorsApiController');

    // Primer
    Route::post('primers/media', 'PrimerApiController@storeMedia')->name('primers.storeMedia');
    Route::apiResource('primers', 'PrimerApiController');
});
