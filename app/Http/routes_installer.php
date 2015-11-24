<?php

Route::group(['as' => 'LaravelInstaller::', 'namespace' => 'App\Http\Controllers'], function()
{
    Route::group(['prefix' => 'install', 'middleware' => 'RachidLaasri\LaravelInstaller\Middleware\canInstall'], function(){
        get('final', [
            'as' => 'final',
            'uses' => 'SetupController@index'
        ]);
	post('final', [
	    'as' => 'finalPost',
	    'uses' => 'SetupController@setup'
	]);
    });
});
