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
	      <li><a href="#requirements" data-toggle="tab">Modules PHP</a></li>
	      <li class="active"><a href="#permissions" data-toggle="tab">Droits des fichiers</a></li>
	    </ul>
	    
            <div class="panel-body">
              <div class="row row-card">
		<div class="col-sm-6 col-sm-offset-3">
                  <ul class="list-group">
                    @foreach($permissions['permissions'] as $permission)
                      <li class="list-group-item">
			@if($permission['isSet'])
                          <span class="label label-fill label-success">
                            {{ $permission['permission'] }}
                          </span>
			@else
                          <span class="label label-danger">
                            {{ $permission['permission'] }}
                          </span>
			@endif
			{{ $permission['folder'] }}
                      </li>
                    @endforeach
                  </ul>
		</div>
	      </div>
              @if(!isset($permissions['errors']))
                <a class="btn btn-warning btn-fill btn-wd btn-sm pull-right" href="{{ route('LaravelInstaller::database') }}">
                  {{ trans('messages.next') }}
                </a>
              @endif
            </div>

	  </div>
	  
	</div>
      </div>
    </div>
@stop
