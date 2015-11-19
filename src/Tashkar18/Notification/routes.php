<?php

/*
|--------------------------------------------------------------------------
| Notification Routes
|--------------------------------------------------------------------------
*/
Route::model('notification', 'Tashkar18\Notification\Notification');
Route::group(['prefix' => Config::get('notification::routing.prefix').'/'.Config::get('notification::routing.resource')], function() {
    Route::get('', 'Tashkar18\Notification\NotificationsController@index');
    Route::get('/{notification}', 'Tashkar18\Notification\NotificationsController@read');
});