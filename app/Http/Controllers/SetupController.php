<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\settings;
use RachidLaasri\LaravelInstaller\Helpers\InstalledFileManager;

class SetupController extends Controller
{
    
    public function index()
    {
        return view('vendor.installer.lemuret');
    }

    /**
     * Populates the site info.
     *
     * @param  Request  $request
     * @return Response
     */
    public function setup(Request $request,InstalledFileManager $fileManager)
    {
        $site_name = $request->input('site_name');
	$site_description = $request->input('site_description');
	$email = $request->input('email');
	$school_name = $request->input('school_name');

	if ($request->hasFile('background_filename')) {
	    $settings->set('background_filename',$request->file('background-photo'));
	}
	
	// Retrieve the settings by the id, or create them if row doesn’t exist.
	$settings = settings::firstOrCreate(['id' => 1]);
	$settings->set('site_name',$site_name);
	$settings->set('site_description',$site_description);
	$settings->set('email',$email);
	$settings->set('school_name',$school_name);

	$fileManager->update(
            config('installer.last_version')
        );
	
	return redirect('/');
    }
}
