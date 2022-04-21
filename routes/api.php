<?php
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    // Locations
    Route::post('locations/media', 'LocationsApiController@storeMedia')->name('locations.storeMedia');
    Route::apiResource('locations', 'LocationsApiController');

    // Doc Library
    Route::post('doc-libraries/media', 'DocLibraryApiController@storeMedia')->name('doc-libraries.storeMedia');
    Route::apiResource('doc-libraries', 'DocLibraryApiController');

    // Cases Modal
    Route::apiResource('cases-modals', 'CasesModalApiController');

    // Ortho Chat
    Route::apiResource('ortho-chats', 'OrthoChatApiController');
    Route::post('allDoctors', 'OrthoChatApiController@allDoctors');

    // Staff Notifications
    Route::apiResource('staff-notifications', 'StaffNotificationsApiController');
});
