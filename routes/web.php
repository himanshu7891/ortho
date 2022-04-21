<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::post('locations/media', 'LocationsController@storeMedia')->name('locations.storeMedia');
    Route::post('locations/ckmedia', 'LocationsController@storeCKEditorImages')->name('locations.storeCKEditorImages');
    Route::resource('locations', 'LocationsController');

    // Doc Library
    Route::delete('doc-libraries/destroy', 'DocLibraryController@massDestroy')->name('doc-libraries.massDestroy');
    Route::post('doc-libraries/media', 'DocLibraryController@storeMedia')->name('doc-libraries.storeMedia');
    Route::post('doc-libraries/ckmedia', 'DocLibraryController@storeCKEditorImages')->name('doc-libraries.storeCKEditorImages');
    Route::resource('doc-libraries', 'DocLibraryController');

    // Cases Modal
    Route::delete('cases-modals/destroy', 'CasesModalController@massDestroy')->name('cases-modals.massDestroy');
    Route::resource('cases-modals', 'CasesModalController');

    // Ortho Chat
    Route::delete('ortho-chats/destroy', 'OrthoChatController@massDestroy')->name('ortho-chats.massDestroy');
    Route::post('ortho-chats/saveLocation', 'OrthoChatController@saveLocation')->name('ortho-chats.saveLocation');
    Route::get('ortho-chats/updateDoctorsStatus', 'OrthoChatController@updateDoctorsStatus')->name('ortho-chats.updateDoctorsStatus');
    Route::resource('ortho-chats', 'OrthoChatController', ['except' => ['create', 'store', 'edit', 'update']]);

    // Staff Notifications
    Route::delete('staff-notifications/destroy', 'StaffNotificationsController@massDestroy')->name('staff-notifications.massDestroy');
    Route::resource('staff-notifications', 'StaffNotificationsController');
    Route::get('getUser', 'StaffNotificationsController@getUser')->name('staff-notifications.getUser');
    Route::post('staff-notifications/updateStaff', 'StaffNotificationsController@updateStaff')->name('staff-notifications.updateStaff');

    // Appointments
    Route::delete('appointments/destroy', 'AppointmentsController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
