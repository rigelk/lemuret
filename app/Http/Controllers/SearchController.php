<?php namespace App\Http\Controllers;

use DB;
use App\Promo;
use App\Tag;
use Debugbar;
use Input;
use Response;

class SearchController extends Controller {

    /*
       |--------------------------------------------------------------------------
       | Home Controller
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
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
	$options = array();
	
	$series = DB::table('series')->orderBy('id')->distinct()->get();
	
	$profils = DB::table('users')
	    ->join('user_info', 'users.id', '=', 'user_info.iduser_info');

	if(Input::has('search')) {
	    $search = explode(",",Input::get('search'));
	    $ids = DB::table('user_tags');
	    $i = 0;
	    foreach ($search as $s) {
		if ($s != ''){
		    $liste_ids_forS = Tag::where('info_tags', '=', $s)->lists('id');
		    $ids->whereIn('id', $liste_ids_forS);
		}
	    }
	    $ids = $ids->select('id')
		->distinct();

	    Debugbar::info($ids->lists('id'));
	    
	    $profils = $profils->whereIn('users.id', $ids->lists('id'));
	    Debugbar::info('il y a '.$profils->count('users.id').' profil(s) retourné(s) par la requête');
	}
	if(Input::has('serie')) {
	    $profils = $profils->whereIn('info_promo_type', explode(' ',Input::get('serie')));
	}
	if(Input::has('annee')) {
	    $profils = $profils->whereIn('info_promo', explode(' ',Input::get('annee')));
	    if(empty(Input::except('annee'))) {
		$img = Promo::whereIn('year', explode(' ',Input::get('annee')))->get()->first(); // reste à récupérer l’image correspondant à la promo :)
		$options['promo_image'] = Input::get('annee');
	    }
	}

	/* Données essentielles à la page de recherche normale */
	// on s’occupe des profils dans le retour de page, afin de remplir la condition avant de paginer
	$options['series'] = $series;

	/* Ajout des données accessoires */
	if(isset($img) && $img) {
	    $options['promo_image'] = $img;
	}

	/* Sélecteur principal de vues */
	if($profils->get()) {
	    $profils = $profils->paginate(15); // on get(), mais avec de la pagination :)
	    $options['profils'] = $profils->appends(Input::except('page')); // le append permet d’avoir une pagination correcte (sans perdre le fil :)
	    return view('search.search', $options);
	} else {
	    return view('search.empty');
	}
    }

    public function query() // Utilisé par l’autosuggestion du champ de recherche
    {
        $query = explode(' ',Input::get('tags')); // cast de string à array
	$query = $query[count($query)-1]; // on récupère le dernier mot de l’array

	$results = DB::table('user_tags')->where('info_tags', 'LIKE', "%$query%")->select('info_tags')->distinct()->get();

	$data = array(); // variable de retour, stocke les résultats à suggérer par typeahead
	foreach ($results as $result): // transformation de l’objet en array
		 $data[] = $result;
	endforeach;

        return Response::json($data); // transformation de l’array en json
    }

    public function map()
    {
	return view('search.map');
    }
    
}
