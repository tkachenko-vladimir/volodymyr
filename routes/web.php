<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
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

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Languages
    Route::delete('languages/destroy', 'LanguagesController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguagesController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientsController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientsController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::resource('clients', 'ClientsController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Notarization
    Route::delete('notarizations/destroy', 'NotarizationController@massDestroy')->name('notarizations.massDestroy');
    Route::resource('notarizations', 'NotarizationController');

    // Translators
    Route::delete('translators/destroy', 'TranslatorsController@massDestroy')->name('translators.massDestroy');
    Route::post('translators/media', 'TranslatorsController@storeMedia')->name('translators.storeMedia');
    Route::post('translators/ckmedia', 'TranslatorsController@storeCKEditorImages')->name('translators.storeCKEditorImages');
    Route::resource('translators', 'TranslatorsController');

    // Primer
    Route::delete('primers/destroy', 'PrimerController@massDestroy')->name('primers.massDestroy');
    Route::post('primers/media', 'PrimerController@storeMedia')->name('primers.storeMedia');
    Route::post('primers/ckmedia', 'PrimerController@storeCKEditorImages')->name('primers.storeCKEditorImages');
    Route::resource('primers', 'PrimerController');

    // Schet
    Route::delete('schets/destroy', 'SchetController@massDestroy')->name('schets.massDestroy');
    Route::resource('schets', 'SchetController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
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
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Languages
    Route::delete('languages/destroy', 'LanguagesController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguagesController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientsController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientsController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::resource('clients', 'ClientsController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Notarization
    Route::delete('notarizations/destroy', 'NotarizationController@massDestroy')->name('notarizations.massDestroy');
    Route::resource('notarizations', 'NotarizationController');

    // Translators
    Route::delete('translators/destroy', 'TranslatorsController@massDestroy')->name('translators.massDestroy');
    Route::post('translators/media', 'TranslatorsController@storeMedia')->name('translators.storeMedia');
    Route::post('translators/ckmedia', 'TranslatorsController@storeCKEditorImages')->name('translators.storeCKEditorImages');
    Route::resource('translators', 'TranslatorsController');

    // Primer
    Route::delete('primers/destroy', 'PrimerController@massDestroy')->name('primers.massDestroy');
    Route::post('primers/media', 'PrimerController@storeMedia')->name('primers.storeMedia');
    Route::post('primers/ckmedia', 'PrimerController@storeCKEditorImages')->name('primers.storeCKEditorImages');
    Route::resource('primers', 'PrimerController');

    // Schet
    Route::delete('schets/destroy', 'SchetController@massDestroy')->name('schets.massDestroy');
    Route::resource('schets', 'SchetController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
