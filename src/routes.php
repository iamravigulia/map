<?php
use Illuminate\Support\Facades\Route;

// Route::get('greeting', function () {
//     return 'Hi, this is your awesome package! map';
// });

// Route::get('Map/test', 'EdgeWizz\Map\Controllers\MapController@test')->name('test');

Route::post('fmt/Map/store', 'EdgeWizz\Map\Controllers\MapController@store')->name('fmt.map.store');

Route::post('fmt/map/update/{id}', 'EdgeWizz\Map\Controllers\MapController@update')->name('fmt.map.update');

Route::any('fmt/map/inactive/{id}',  'EdgeWizz\Map\Controllers\MapController@inactive')->name('fmt.map.inactive');
Route::any('fmt/map/active/{id}',  'EdgeWizz\Map\Controllers\MapController@active')->name('fmt.map.active');
