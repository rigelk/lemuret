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
	      <li><a href="#env" data-toggle="tab">Environnement</a></li>
	      <li class="active"><a href="#requirements" data-toggle="tab">Modules PHP</a></li>
	      <li><a href="#permissions" data-toggle="tab">Droits des fichiers</a></li>
	    </ul>
	    
            <div class="panel-body">
	      <div class="row row-card">
		<div class="col-sm-6 col-sm-offset-3">
                  <ul class="list-group">
                    @foreach($requirements['requirements'] as $element => $enabled)
                      <li class="list-group-item" style="text-align:center;">
			@if($enabled)
                          <span style="color:green;">
                            <i class="fa fa-check-circle"></i>
                          </span>
			@else
                          <span style="color:red;">
                            <i class="fa fa-times"></i>
                          </span>
			@endif
			{{ $element }}
                      </li>
                    @endforeach
                  </ul>
		</div>
	      </div>
              @if(!isset($requirements['errors']))
                <a class="btn btn-warning btn-sm btn-fill btn-wd pull-right" href="{{ route('LaravelInstaller::permissions') }}">
                  {{ trans('messages.next') }}
                </a>
              @endif
            </div>
	    
	  </div>
	  
	</div>
      </div>
    </div>
@stop
