<?php namespace App\Http\Controllers;

use App\User;

class MessagesController extends Controller {

    /*
       |--------------------------------------------------------------------------
       | Profile Controller
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
	$this->middleware('auth');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showMessages()
    {
	return view('profile.messages.messages', [
	]);
    }
    
}
