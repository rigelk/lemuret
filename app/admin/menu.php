<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

Admin::menu()->url('/')->label('Panneau d’administration')->icon('fa-dashboard')->uses('\App\Http\Controllers\AdminController@getIndex');
Admin::menu()->url('/messages')->label('Messagerie administrative')->icon('fa-envelope')->uses('\App\Http\Controllers\AdminController@getMessages');
Admin::menu()->label('Gestion des utilisateurs')->icon('fa-book')->items(function ()
{
    Admin::menu('\App\User')->icon('fa-user');
});
Admin::menu()->url('database')->label('Base de données')->icon('fa-database')->uses('\App\Http\Controllers\AdminController@dataIndex');
