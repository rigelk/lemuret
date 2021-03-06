<html>
  <head>
    <title>Le Muret</title>
    
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <link href="{{{ asset('/css/foundation.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/css/home.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/css/search/typeahead.css') }}}" rel="stylesheet">
  </head>
  <body style="background-image: url('img/muret{{ Auth::guest() ? '2' : '' }}.jpg')">
    <div class="cover black"></div>
    <div class="container">
      @include('flash::message')
      <div class="row iconrow">
	
	<div class="right navicon">
	  @if (!Auth::guest())
	    <img src="img/avatar@2x.png" alt="Photo de profil">
	    <div id="menu">
	      <ul>
		<li class="drop">
		  <a id="titleMenu" href="#">{{ substr(Auth::user()->prenom, 0, 20) }} {{ Auth::user()->name[0] }}.</a>
		  <div class="dropdownContain">
		    <div class="dropOut">
		      <div class="triangle"></div>
		      <ul>
			<li><a href="{{ url('/profile').'/' }}{{ Auth::user()->id }}"> Profil</li></a>
			@if (Auth::user()->isAdmin())
			  <li><a href="{{ url('/admin') }}"> Administration</li></a>
			@endif
			<li><a href="{{ url('/messages') }}">Messages <span class="alert radius label">2</a></li>
			  <li><a href="{{ url('/auth/logout') }}">Se déconnecter</a></li>
		      </ul>
		    </div>
		  </div>    
		</li>
	      </ul>
	    </div>
	  @endif
	</div>
      </div>
      
      <div class="content">
	<div class="title">Le Muret</div>
	  <div class="quote">Le réseau professionnel des anciens élèves de la Perverie</div>
	{{-- <div class="quote">{{ Inspiring::quote() }}</div> --}}
      </div>
      <div id="landing" class="row">
	<div class="large-centered text-center">
	  {{-- <a href="index.html"><img class="logo" src="img/logo.jpg"/></a>  --}}
	</div>
	@if (!Auth::guest())
	  <div class="large-centered text-center">
	    <form action="{{ url('/search') }}" method="get">
	      <div class="row text-center">
		<div class="small-centered columns">
		  <div class="row collapse">
		    <div id="search" class="small-8 large-7 small-centered columns">
		      <input class="typeahead" type="text" name="search" placeholder="On trouve toujours qui on cherche au Muret…" autofocus/>
		    </div>
		    <div class="small-4 small-centered large-centered columns">
		      <div class="small-5 columns">
			<button type="submit" class="button postfix">Go!</button>
		      </div>
		      <div class="small-5 columns">
			<a href="{{ url('/map') }}" class="button postfix">Voir la carte</a>
		      </div>
		    </div>
		  </div>
		</div>
	      </div>
	    </form>
	  </div>
	@else
	  <div class="row">
	    <div class="large-6 large-centered columns">
	      <ul class="button-group radius even-3">
		<li><a href="{{ url('/auth/login') }}" class="button">Se connecter</a></li>
		<li><a href="{{ url('/auth/register') }}" class="button">S’inscrire</a></li>
	      </ul>
	    </div>
	  </div>
	@endif
      </div>
    </div>
    @include('footer')
  </body>
</html>

<script src="//code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="{{{ asset('/js/foundation.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('/js/vendor/typeahead.bundle.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('/js/vendor/bootstrap-tagsinput.min.js') }}}" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
    var engine = new Bloodhound({
        remote: '/search/query?tags=%QUERY',
        // '...' = displayKey: '...'
        datumTokenizer: Bloodhound.tokenizers.whitespace('info_tags'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    engine.initialize();

    $("#search .typeahead").typeahead({
	item: 8,
        hint: true,
	delay: 500,
	offset: false, // true = les suggestions doivent débuter par les caractères écrits
	accent: true, // true = case-insensitive
	compression: true,
        highlight: true,
        minLength: 2, // longueur minimale du mot considéré pour suggérer
	matcher: function (item) {
	    if (item.toLowerCase().indexOf(this.query.toLowerCase()) == 0) {
                return ~item.toLowerCase().indexOf(this.query.toLowerCase());
            } 
	}
    }, {
        source: engine.ttAdapter(),
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'Tag_list',
        // the key from the array we want to display (name,id,email,etc...)
        displayKey: 'info_tags',
        templates: {
            empty: [
                '<div class="empty-message">aucun <b>tag</b> correspondant</div>'
            ]
        }
    });

});

</script>
