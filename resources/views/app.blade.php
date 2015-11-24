<!DOCTYPE html>
<html lang="fr">
  <head>
    @section('header')
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Le Muret</title>

      <link href="{{ asset('/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    @show
  </head>
  <body>
    <nav id="nav" class="navbar navbar-default">
      <div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	    <span class="sr-only">Toggle Navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="{{ url('/') }}">Le Muret</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav">
	    {{-- <li><a href="">Accueil</a></li> --}}
	    {!! Form::open(array('url' => 'foo/bar')) !!}
	    {!! Form::close() !!}
	  </ul>

	  <ul class="nav navbar-nav">
	    @section('navbar')	      
	    @show
	  </ul>
	  
	  <ul class="nav navbar-nav navbar-right">
	    @if (Auth::guest())
	      <li><a href="{{ url('/auth/login') }}">Se connecter</a></li>
	      <li><a href="{{ url('/auth/register') }}">S’inscrire</a></li>
	    @else
	      <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ substr(Auth::user()->prenom, 0, 20) }} {{ Auth::user()->name[0] }}. <span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
		  <li><a href="{{ url('/profile').'/' }}{{ Auth::user()->id }}"> Profil</li></a>
		  @if (Auth::user()->isAdmin())
			  <li><a href="{{ url('/admin') }}"> Administration</li></a>
		  @endif
		  <li><a href="{{ url('/messages') }}">Messages <span class="label label-danger">2</span></a></li>
		  <li><a href="{{ url('/auth/logout') }}">Déconnexion</a></li>
		</ul>
	      </li>
	    @endif
	  </ul>
	</div>
      </div>
    </nav>

    <!-- Scripts -->
    <script src="{{ asset('js/vendor.js') }}"></script>
    <link href="{{ asset('/css/vendor/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-social.css') }}" rel="stylesheet">
    
    @yield('content')

    @section('js')
    
    @show
  </body>
</html>
