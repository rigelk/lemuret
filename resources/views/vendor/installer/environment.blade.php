@extends('vendor.installer.layouts.master')


@section('container')
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">

	<!--      Wizard container        -->   
        <div class="wizard-container"> 

	  <div class="card wizard-card ct-wizard-orange" id="wizardProfile">

	    @include('vendor.installer.layouts.header')
	    <ul>
	      <li class="active"><a href="#env" data-toggle="tab">Environnement</a></li>
	      <li><a href="#requirements" data-toggle="tab">Modules PHP</a></li>
	      <li><a href="#permissions" data-toggle="tab">Droits des fichiers</a></li>
	    </ul>
	    
	    <form method="post" action="{{ route('LaravelInstaller::environmentSave') }}">
	      <div class="panel-card">
		<div class="panel-body">
		  
		  <div class="row row-card">

		    @if (session('message'))
                      <div class="alert alert-warning">
			{{ session('message') }}
                      </div>
		    @endif
		    
		    <div class="col-sm-10 col-sm-offset-1">
		      <ul class="list-group">
			<textarea name="envConfig" rows="10" style="width:100%;border:1pt solid lightgray;border-radius:9px;padding:10px;">{{ $envConfig }}</textarea>
		      </ul>
                    </div>
		    
	          </div>

		  
		  <div class="wizard-footer">
                    @if(!isset($environment['errors']))
		      <a class="btn btn-warning btn-wd btn-sm btn-fill pull-right" href="{{ route('LaravelInstaller::requirements') }}">
			{{ trans('messages.next') }}
		      </a>
                    @endif
                    {!! csrf_field() !!}
                    <input type="submit" class="btn btn-info btn-fill btn-wd btn-sm pull-left" value="{{ trans('messages.environment.save') }}">
		  </div>
		  
		</div>
	      </div>
	    </form>
	  </div>
	  
	</div>
	
      </div>
    </div>
  </div>
@stop
