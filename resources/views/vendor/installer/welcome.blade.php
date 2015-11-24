@extends('vendor.installer.layouts.master')

@section('container')
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">

	<!--      Wizard container        -->   
        <div class="wizard-container"> 

	  <div class="card wizard-card ct-wizard-orange" id="wizardProfile">

	    @include('vendor.installer.layouts.header')

	    <div class="panel-card">
	      <div class="panel-body">
		<p>
		  Bienvenue dans l’assistant d’installation. Nous allons passer en revue la configuration de votre serveur, afin de vérifier que tout est conforme pour un bon fonctionnement futur. Vous pouvez passer cette vérification.
		  <!-- {{ trans('messages.welcome.message') }} -->
		</p>
	      </div>
	    </div>
	    <div class="wizard-footer">
	      <a class="btn btn-info btn-sm btn-wd btn-fill pull-left" href="{{ route('LaravelInstaller::final') }}">
		Passer la vérification
	      </a>
	      <a class="btn btn-warning btn-sm btn-wd btn-fill pull-right" href="{{ route('LaravelInstaller::environment') }}">
		{{ trans('messages.next') }}
	      </a>
	    </div>
	  </div>
	  
	  
        </div>
	
      </div>
      
    </div>
  </div>
@stop
