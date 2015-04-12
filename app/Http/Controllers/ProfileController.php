<?php namespace App\Http\Controllers;

use App\User;
use DB;

class ProfileController extends Controller {

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
    public function showProfile($id)
    {
	if(($user = User::find($id)) != null){
	    $profil = DB::table('users')
		->join('user_info', 'users.id', '=', 'user_info.iduser_info')
		->where('id', $id)
		->select('info_image', 'info_lieu', 'info_poste', 'info_promo', 'info_promo_type')
		->first();
	    return view('profile.profile', [
		'id' => $id,
		'name' => $user->name,
		'prenom' => User::find($user->id)->prenom,
		'mail' => User::find($user->id)->email,
		'profil' => $profil,
		'labels' => $user->tagArray()
	    ]);
	} else {
	    return redirect('search');
	}
    }

    public function map()
    {
	return view('search.map');
    }
    
}
