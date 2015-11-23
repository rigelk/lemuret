<?php namespace App\Http\Controllers;

use \App\User;
use Debugbar;

class AdminController extends \SleepingOwl\Admin\Controllers\AdminController {

    /*
       |--------------------------------------------------------------------------
       | Admin Controller
       |--------------------------------------------------------------------------
       |
       | This controller renders your application's "dashboard" for users that
       | are authenticated. Of course, you are free to change or remove the
       | controller as you wish. It is just here to get your app started!
       |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
	$this->middleware('admin');
    }

    public function getIndex()
    {
	$options = array();

	$options['users_pending'] = array();
	foreach (User::all() as $user)
	{
	    if($user->isPending()){
		$options['users_pending'][] = $user;
	    }
	}
	
	return view('admin.index',$options);
    }

    public function dataIndex()
    {
	return view('admin.data');
    }

    public function getConfig()
    {
	return view('admin.config');
    }

    public function getMessages()
    {
	return view('admin.messages');
    }
}
