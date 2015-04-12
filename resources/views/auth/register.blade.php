@extends('app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
	  <div class="panel-heading">S’inscrire</div>
	  <div class="panel-body">
	    @if (count($errors) > 0)
	      <div class="alert alert-danger">
		<strong>Whoops!</strong> Vous avez vexé la machine :-o<br><br>
		<ul>
		  @foreach ($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
		</ul>
	      </div>
	    @endif

	    <p>À la validation de votre baccalauréat, l’établissement
	    vous enverra par mail un lien d’inscription qui vous est
	    propre.</p>
	  </div>
	</div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
	  <div class="panel-heading">S’inscrire sans invitation de l’administration</div>
	  <div class="panel-body">
	    <p>Sans invitation - notamment pour les promotions
	    antérieures à 2015 -, une confirmation de la part
	    l’administration est nécessaire pour vérifier votre
	    identité. Vous recevrez un mail de confirmation à
	    l’adresse fournie.</p>
	    <hr/>
	    @if (count($errors) > 0)
	      <div class="alert alert-danger">
		<strong>Whoops!</strong> Vous avez vexé la machine :-o<br><br>
		<ul>
		  @foreach ($errors->all() as $error)
		    <li>{{ $error }}</li>
		  @endforeach
		</ul>
	      </div>
	    @endif

	    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
	      <input type="hidden" name="_token" value="{{ csrf_token() }}">

	      <div class="form-group">
		<div class="col-md-3 control-label"></div>
		<div class="form-inline col-md-9">
		  <div class="form-group">
		    <label class="col-md-2 control-label">Nom</label>
		    <div class="col-md-4">
		      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-md-2 control-label">Prénom</label>
		    <div class="col-md-4">
		      <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}">
		    </div>
		  </div>
		</div>
	      </div>

	      <div class="form-group">
		<label class="col-md-4 control-label">Addresse mail</label>
		<div class="col-md-6">
		  <input type="email" class="form-control" name="email" value="{{ old('email') }}">
		</div>
	      </div>

	      <div class="form-group">
		<label class="col-md-4 control-label">Mot de passe</label>
		<div class="col-md-6">
		  <input type="password" class="form-control" name="password">
		</div>
	      </div>

	      <div class="form-group">
		<label class="col-md-4 control-label">Confirmer le mot de passe</label>
		<div class="col-md-6">
		  <input type="password" class="form-control" name="password_confirmation">
		</div>
	      </div>

	      <div class="form-group">
		<div class="col-md-6 col-md-offset-4">
		  <button type="submit" class="btn btn-primary">
		    S’inscrire
		  </button>
		</div>
	      </div>
	    </form>
	  </div>
	</div>
      </div>
    </div>
  </div>
@endsection
