@extends('app')

<link href="{{ asset('/css/search/search.css') }}" rel="stylesheet">

@section('content')
    <div class="vertical-center">
      <div class="container">
	
	<div class="row">
	  <div class="col-sm-8 col-sm-offset-2 text-center notfound">Houston, on a un problème !</div>
	</div>
	<div class="row">
	  <div class="col-sm-8 col-sm-offset-2 text-center notfound-subtext">Aucun ancien élève ne correspond aux critères renseignés :-(</div>
	</div>
	
	<div class="row">
	  <div class="col-md-6 col-md-offset-3">
	    <form class="form">
	      <div class="input-group">
		<div>
		  <input id="search" name="search" type="text" class="form-control" value="{{ Input::get('search') }}" autofocus/>
		</div>
		<span class="input-group-btn">
                  
		  <button type="submit" class="btn btn-default">Go!</button>
		  <button type="text" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
		    <span class="caret"></span>
		    <span class="sr-only">Toggle Dropdown</span>
		  </button>
		  <ul class="dropdown-menu">
		    <li><a href="#" id="">Série ES</a></li>
		    <li><a href="#">Série L</a></li>
		    <li><a href="#">Série S</a></li>
		    <li><a href="#">Prépa</a></li>
		    <li class="divider"></li>
		    <li><a href="#">Plus de filtres</a></li>
		  </ul>
		  
		</span>  
		
	      </div>
	    </form>
	  </div>
	</div>
      </div>
      
  </div>
@endsection

@section('js')
  @parent
  <script>
  var SearchInput = $('#search');

  // Multiply by 2 to ensure the cursor always ends up at the end;
  // Opera sometimes sees a carriage return as 2 characters.
  var strLength= SearchInput.val().length * 2;

  SearchInput.focus();
  SearchInput[0].setSelectionRange(strLength, strLength);
  </script>
@stop
