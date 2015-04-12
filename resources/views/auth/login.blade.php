@extends('app')

<link href="{{ asset('/css/auth/login.css') }}" rel="stylesheet">
  
@section('content')
  <div class="container-fluid-full">
    <div class="row-fluid">
      <div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    Se connecter
	    <a href="index.php"><i class="halflings-icon home"></i></a> {{-- TODO : intégrer halflings icon --}}
	    <a href="#"><i class="halflings-icon cog"></i></a> {{-- TODO : intégrer halflings icon --}}
	  </div>
	  <div class="panel-body">
	    @if (count($errors) > 0)
	      <div class="alert alert-danger">
		<strong>Oulala!</strong> Il semble que la machine ne soit pas contente…<br><br>
		<ul>
		  @foreach ($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
		</ul>
	      </div>
	    @endif

	    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
	      <input type="hidden" name="_token" value="{{ csrf_token() }}">

	      <div class="form-group">
		<label class="col-md-4 control-label">Adresse mail</label>
		<div class="col-md-6">
		  <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus/>
		</div>
	      </div>

	      <div class="form-group">
		<label class="col-md-4 control-label">Mot de passe</label>
		<div class="col-md-6">
		  <input type="password" class="form-control" name="password">
		</div>
	      </div>

	      <div class="form-group">
		<div class="col-md-6 col-md-offset-4">
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" name="remember"> Se rappeler de moi
		    </label>
		  </div>
		</div>
	      </div>

	      <div class="form-group">
		<div class="col-md-6 col-md-offset-4">
		  <button type="submit" class="btn btn-primary">Se connecter</button>

		  <a class="btn btn-link" href="{{ url('/password/email') }}">Mot de passe oublié ?</a>
		</div>
	      </div>
	    </form>

	    <hr/>
	    
	    <div class="row-fluid text-center">
	      <div class="col-md-4 col-md-offset-4">
		<div class="btn btn-sm btn-social-icon btn-facebook">
		  <a href="{{ url('/auth/login/facebook') }}"><i class="fa fa-facebook"></i></a>
		</div>
		<div class="btn btn-sm btn-social-icon btn-twitter">
		  <a href="{{ url('/auth/login/twitter') }}"><i class="fa fa-twitter"></i></a>
		</div>
		<div class="btn btn-sm btn-social-icon btn-linkedin">
		  <i class="fa fa-linkedin"></i>
		</div>
		<div class="btn btn-sm btn-social-icon btn-google-plus">
		  <i class="fa fa-google-plus"></i>
		</div>
	      </div>
	    </div>
	    
	  </div>	  
	</div>
      </div>
    </div>    
  </div>

@endsection
