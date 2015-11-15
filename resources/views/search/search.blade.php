@extends('app')

<link href="{{ asset('/css/search/search.css') }}" rel="stylesheet">
<link href="{{{ asset('/css/bootstrap-tagsinput.css') }}}" rel="stylesheet">

@section('content')
  <div class="container" id="containerS">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
	<form class="form" name="form">
	  <div class="input-group">
	    <div class="tagsinput-wrapper">
	      <input id="search" name="search" type="text" class="form-control" value="{{ Input::get('search') }}" data-role="tagsinput" autocomplete="off" autofocus/>
	      <input type="hidden" name="serie"/>
	    </div>
	    <span class="input-group-btn">
	      
              <button type="submit" class="btn btn-default">Go!</button>
              <button type="text" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
	      </button>
              <ul class="dropdown-menu">
		@foreach ($series as $serie)
		  <li><a href="#" onclick="filtreHandler('{{$serie->serie}}')">Série {{ $serie->serie }}</a></li>
		@endforeach
		<li class="divider"></li>
		<li><a href="#">Plus de filtres</a></li>
              </ul>
	      
            </span>  
	    
	  </div>
	</form>
      </div>
    </div>

    @if(isset($promo_image))
      <div class="row promoDiv">
	<div class="col-sm-4 col-sm-offset-4 text-center">
	  {{-- <img class="thumb-search" src="data:image/jpg;base64,{{ chunk_split(base64_encode($promo_image->promo_image)) }}"/> --}}
	  <h1> Promotion {{ Input::get('annee') }}</h1>
	</div>
      </div>
    @endif
    
    @foreach ($profils as $profil)
      <div class="row searchDiv">
	<div class="col-md-1"></div> {{-- centering div --}}
	<div class="col-md-10">
	  <div class="col-md-2">
	    @if ($profil->info_image != null)
	      <img class="thumb-search" src="data:image/jpg;base64,{{ chunk_split(base64_encode($profil->info_image)) }}"/>
	    @else
	      <img data-src="holder.js/130x130/gray/text:photo de profil \n \n 130x130">
	    @endif
	  </div>
	  <div class="col-md-8">
	    <div class="vcenter-plus">
	      <p class="name">{{ $profil->prenom }} {{ $profil->name }}</p>
	      <p class="promo">
		<a href="{{ url('/search?annee='.$profil->info_promo) }}">Promo {{ $profil->info_promo }}</a>
		-
		<a href="{{ url('/search?serie='.$profil->info_promo_type) }}">Série {{ $profil->info_promo_type }}</a>
	      </p>
	      <p class="work">{{ $profil->info_poste }} ({{ $profil->info_lieu }})</p>
	    </div>
	  </div>
	  <div class="col-md-1">
	    <a href="{{ url('/profile/') }}/{{ $profil->id }}" class="btn btn-info contact">Profil  <i class="fa fa-chevron-right"></i></a>
	  </div>
	</div>
      </div>
    @endforeach
    
  </div>

  <div class="container footer">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-4 text-center paginate">
	{!! $profils->render() !!}
      </div>
    </div>
  </div>
@endsection

@section('js')
  @parent
  <script src="{{ asset('js/utilities.js') }}"></script>
  <script>
  var SearchInput = $('#search');

  // Multiply by 2 to ensure the cursor always ends up at the end;
  // Opera sometimes sees a carriage return as 2 characters.
  var strLength= SearchInput.val().length * 2;

  SearchInput.focus();
  SearchInput[0].setSelectionRange(strLength, strLength);
  </script>
  <script>
  $('#containerS').css('min-height',$(window).height()-70);
  </script>
  <script>
  function filtreHandler($id){
      document.form.serie.value = $id;
      document.form.submit();
  }
  </script>
  <script src="http://rawgit.com/twitter/typeahead.js/master/dist/bloodhound.min.js"></script>
  <script src="{{{ asset('/js/bootstrap3-typeahead.min.js') }}}" type="text/javascript"></script>
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

      $("#search").tagsinput({
	  typeaheadjs: {
	      item: 8,
              hint: true,
	      delay: 500,
	      offset: false, // true = les suggestions doivent débuter par les caractères écrits
	      accent: true, // true = case-insensitive
	      compression: true,
              highlight: true,
              minLength: 2, // longueur minimale du mot considéré pour suggérer
	      name: 'Tag_list',
	      displayKey: 'info_tags',
	      source: engine.ttAdapter(),
	      templates: {
		  empty: [
		      '<div class="empty-message">aucun <b>tag</b> correspondant</div>'
		  ]
	      }
	  }
      });

  });


  </script>
@stop
