@extends('app')

@section('header')
  @parent
  <link href="{{ asset('/css/search/map.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div id="map_canvas" class="container" style="width:100%;height:100%;margin:none;">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
	<form class="form">
	  <div class="input-group">
	    <div>
	      <input id="search" type="text" class="form-control" autofocus/>
	    </div>
	    <span class="input-group-btn">
              
              <button type="submit" class="btn btn-default">Go!</button>
              <button type="text" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
	      </button>
              <ul class="dropdown-menu">
		<li><a href="#">Série ES</a></li>
		<li><a href="#">Série L</a></li>
		<li><a href="#">Série S</a></li>
		<li><a href="#">Prépa</a></li>
		<li class="divider"></li>
		<li><a href="#">Plus d’options</a></li>
              </ul>
	      
            </span>  
	    
	  </div>
	</form>
      </div>
    </div>

  </div>
@endsection

<link href="{{ asset('/css/search/map.css') }}" rel="stylesheet">

@section('js')
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=&sensor=false&extension=.js"></script>
  <script>
  document.getElementById('map_canvas').style.height = (window.innerHeight
						     || document.documentElement.clientHeight
						     || document.body.clientHeight) - $('#nav').height();
  google.maps.event.addDomListener(window, 'load', init);
  var map;
  function init() {
      var mapOptions = {
	  center: new google.maps.LatLng(47.85556,1.257018),
	  zoom: 6,
	  zoomControl: true,
	  zoomControlOptions: {
	      style: google.maps.ZoomControlStyle.SMALL,
	  },
	  disableDoubleClickZoom: false,
	  mapTypeControl: false,
	  scaleControl: false,
	  scrollwheel: false,
	  panControl: false,
	  streetViewControl: false,
	  draggable : true,
	  overviewMapControl: false,
	  overviewMapControlOptions: {
	      opened: false,
	  },
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  styles: [ {

	      "stylers": [

		  { "hue": "#007fff" },

		  { "saturation": 89 }

	      ]

	  },{

	      "featureType": "water",

	      "stylers": [

		  { "color": "#ffffff" }

	      ]

	  },{

	      "featureType": "administrative.country",

	      "elementType": "labels",

	      "stylers": [

		  { "visibility": "off" }

	      ]

	  }

	  ],
      }
      var mapElement = document.getElementById('map_canvas');
      var map = new google.maps.Map(mapElement, mapOptions);
      var locations = [

      ];
      for (i = 0; i < locations.length; i++) {
	  if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
	  if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
	  if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
	  if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
	  if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
	  marker = new google.maps.Marker({
	      icon: markericon,
	      position: new google.maps.LatLng(locations[i][5], locations[i][6]),
	      map: map,
	      title: locations[i][0],
	      desc: description,
	      tel: telephone,
	      email: email,
	      web: web
	  });
	  link = '';     }

  }      
  </script>
@stop
