<html>
  <head>
    <title>Le Muret</title>

    <link href="{{{ asset('/css/vendor.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/css/bootstrap.min.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/css/home.css') }}}" rel="stylesheet">
    <link href="{{{ asset('/css/search/typeahead.css') }}}" rel="stylesheet">
  </head>
  <body>
    <div class="home-background" style="background-image: url('img/muret{{ Auth::guest() ? '2' : '' }}.jpg')"></div>
    <div class="cover black"></div>
    <div id="home-landing" class="container">

      <div class="row col-xs-0" style="position:absolute;z-index:100;top:5vh;right:20vw;">

	<div class="navicon col-xs-12 col-lg-12 col-xs-push-6 col-lg-push-8">
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
			  <li><a href="{{ url('/admin') }}">Administration</li></a>
			@endif
			<li><a href="{{ url('/messages') }}">Messages <label class="label label-danger">2</label</a></li>
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
      	@include('flash::message')
	<div class="title">Le Muret</div>
	<div class="quote">Le réseau professionnel des anciens élèves de la Perverie</div>
	{{-- <div class="quote">{{ Inspiring::quote() }}</div> --}}

	@if (!Auth::guest())
	  <div class="row">
	    <form action="{{ url('/search') }}" method="get">
	      <div class="row">
		<div id="search" class="col-sm-12">
		  <div class="input-group">
		    <input style="width:100%" class="form-control" type="text" name="search" placeholder="On trouve toujours qui on cherche au Muret…" autofocus/>
		    <span class="input-group-btn">
		      
		      <button type="submit" class="btn btn-default">Go!</button>
		      
		    </span>
		  </div>
		</div>
	      </div>
	    </form>
	  </div>
	@else
	  <div class="row">
	    <div class="col-sm-12 col-lg-6 col-lg-offset-3">
	      <div class="ui-group-buttons">
		<link class="rippleJS" />
                <a href="{{ url('/auth/login') }}" role="button" class="btn btn-primary btn-lg" style="border-bottom-left-radius: 0.25em; border-top-left-radius: 0.25em;">Se connecter</a>
                <div class="or or-lg"></div>
                <a href="#info" role="button" class="btn btn-primary btn-lg">en savoir plus</a>
            </div>
	    </div>
	  </div>
	@endif

      </div>
      <div id="landing" class="row">
	<div class="large-centered text-center">
	  {{-- <a href="index.html"><img class="logo" src="img/logo.jpg"/></a>  --}}
	</div>
	
      </div>

    </div>
    @include('footer')
    <a name="info"></a>
    <div class="container">
      
      <div class="fake-browser-ui">
	<div class="frame">
    	  <span></span>
    	  <span></span>
    	  <span></span>
	</div>
	Damn
      </div>
    </div>
  </body>
</html>

<script src="{{{ asset('/js/vendor.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('/js/vendor/typeahead.bundle.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('/js/vendor/bootstrap-tagsinput.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('/js/jquery.scrolly.js') }}}" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
    var engine = new Bloodhound({
        remote: '/search/query?tags=%QUERY',
        // '...' = displayKey: '...'
        datumTokenizer: Bloodhound.tokenizers.whitespace('info_tags'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    engine.initialize();

    $("").typeahead({
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

    $('.parallax').scrolly({bgParallax: true});

    function juizScrollTo(element){			
	$(element).click(function(){
	    var goscroll = false;
	    var the_hash = $(this).attr("href");
	    var regex = new RegExp("\#(.*)","gi");
	    var the_element = '';
	    
	    if(the_hash.match("\#(.+)")) {
		the_hash = the_hash.replace(regex,"$1");
		
		if($("#"+the_hash).length>0) {
		    the_element = "#" + the_hash;
		    goscroll = true;
		}
		else if($("a[name=" + the_hash + "]").length>0) {
		    the_element = "a[name=" + the_hash + "]";
		    goscroll = true;
		}
		
		if(goscroll) {
		    $('html, body').animate({
			scrollTop:$(the_element).offset().top
		    }, 'slow');
		    return false;
		}
	    }
	});					
    };
    juizScrollTo('a[href^="#"]');
});
</script>
