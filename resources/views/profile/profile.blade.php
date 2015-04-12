@extends('app')

<link href="{{ asset('/css/search/search.css') }}" rel="stylesheet">
<link href="{{ asset('/css/profile/profile.css') }}" rel="stylesheet">

@section('navbar')
  @if (Auth::user()->id == $id)
    <li><a href="#" id="modify" data-toggle="popover" data-trigger="focus" data-container="body" data-placement="bottom" title="Comment modifier mon profil ?" data-content="Cliquez sur les champs de votre profil que vous souhaitez mettre à jour. Certains champs (votre nom, promo, etc…) sont inaltérables cela dit.">Modifier mon profil</a></li>
  @endif
@stop

@section('content')
  <div class="container">

    @section('back')
      
    @show

    <div class="row">
      <div class="col-md-1"></div> {{-- centering div --}}
      <div class="col-md-10">
	<div class="col-md-2">
	  @if ($profil->info_image != null)
	    <img class="thumb-search" src="data:image/jpg;base64,{{ chunk_split(base64_encode($profil->info_image)) }}"/>
	  @else
	    <img data-src="holder.js/130x130/gray/text:profil \n \n 130x130">
	  @endif
	</div>
	<div class="col-md-7">
	  <div class="vcenter-plus">
	    <p class="name">{{ $prenom }} {{ $name }}</p>
	    <p class="promo">
	      <a href="{{ url('/search?annee='.$profil->info_promo) }}">Promo {{ $profil->info_promo }}</a>
	      -
	      <a href="{{ url('/search?serie='.$profil->info_promo_type) }}">Série {{ $profil->info_promo_type }}</a>
	    </p>
	    <p class="work">
	      <span id="job">{{ $profil->info_poste }}</span>
	      (<span id="city">{{ $profil->info_lieu }}</span>)
	    </p>
	  </div>
	  <div class="vcenter">
	    @foreach ($labels as $label)
	      @foreach ($label as $labe)
		<a href="{{ url('/search?search='.$labe) }}" class="label label-info">{{ $labe }}</a>
	      @endforeach
	    @endforeach
	  </div>
	</div>
	<div class="col-md-3">
	  @if (!(Auth::user()->id == $id))
	    <div class="btn-group pull-right vcenter">
	      <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Me contacter</button>
	      <ul class="dropdown-menu">
		<li><a id="modalMP" href="#" data-whatever="@getbootstrap">par message privé</a></li>
		<li class="divider"></li>
		<li><a href="mailto:{{ $mail }}">par mail</a></li>
		<li class="disabled"><a href="#">par téléphone</a></li>
	      </ul>
	    </div>
	  @endif
	</div>
      </div>
    </div>

    <div class="row infoRow">
      <div class="col-md-1"></div> {{-- centering div --}}
      <div class="col-md-10">
	<ul class="nav nav-tabs">
          <li class="nav active"><a href="#A" data-toggle="tab">Expérience</a></li>
          <li class="nav"><a href="#B" data-toggle="tab">Compétences</a></li>
          <li class="nav"><a href="#C" data-toggle="tab">Formation</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
          <div class="tab-pane fade in active" id="A">
	    <p>2010-Today: Senior Risk Consultant chez HSBC Hong-Kong</p>
	    <p>2009: Summer School chez JP Morgan Londres 2 mois</p>
	    <p>2005-2009: Analyste financier chez Société Générale Lyon</p>
	    <p>1995-2008:Conseiller bancaire chez Société Générale Lyon</p>
	  </div>
          <div class="tab-pane fade" id="B">Content inside tab B</div>
          <div class="tab-pane fade" id="C">Content inside tab C</div>
	</div>
      </div>
      <div class="col-md-1"></div> {{-- centering div --}}
    </div>


    <!-- /.modal compose message -->
    <div class="modal" id="modalCompose">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Rédaction d’un message</h4>
          </div>
          <div class="modal-body">
            <form role="form" class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2 text-right" for="inputTo">À</label>
                <div class="col-sm-10"><input class="form-control" id="inputTo" placeholder="liste des destinataires" type="email"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 text-right" for="inputSubject">Sujet</label>
                <div class="col-sm-10"><input class="form-control" id="inputSubject" placeholder="sujet de votre message" type="text"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-12" for="inputBody">Message</label>
                <div class="col-sm-12"><textarea class="form-control" id="inputBody" rows="13"></textarea></div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button> 
            <button type="button" class="btn btn-warning pull-left">Sauvegarder le brouillon</button>
            <button type="button" class="btn btn-primary ">Envoyer <i class="fa fa-arrow-circle-right fa-lg"></i></button>
            
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal compose message -->
    
  </div>
@endsection

@section('js')
  @parent
  <script src="{{ asset('js/utilities.js') }}"></script>
  <script>
  $(document).ready(function(){
      $("#modalMP").click(function(){
          var modal = $("#modalCompose");
	  modal.modal('show');
	  modal.find('.modal-body #inputTo').val('{{ $prenom }} {{ $name }}');
      });
  });
  </script>
  @if (Auth::user()->id == $id)
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>    
    $('#job').editable({
	placement: 'left',
	type: 'text',
	pk: {{ $id }},
	url: '/user/update',
	title: 'Renseignez un poste',
	showbuttons: false
    });
    
    $('#city').editable({
	placement: 'right',
	type: 'text',
	pk: {{ $id }},
        title: 'Renseignez une ville de travail',
	url: '/city/update',
        showbuttons: false
    });

    $(function () {
	$('[data-toggle="popover"]').popover()
    })
    </script>
  @endif
@stop
