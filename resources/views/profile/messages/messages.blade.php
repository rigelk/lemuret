@extends('app')

<link href="{{ asset('/css/messages/messages.css') }}" rel="stylesheet">

@section('navbar')
  
@stop

@section('content')
  <div class="container">

    <!-- Récupéré à cette adresse là : http://www.bootply.com/fPfSfH1ID1 -->
    <div class="row">
      <div class="col-sm-3 col-md-2">
      </div>
      <div class="col-sm-9 col-md-10">
        
        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh">
          &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</button>
        <!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Plus <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Marquer comme lus </a></li>
            <li class="divider"></li>
            <li class="text-center"><small class="text-muted">Select messages to see more actions</small></li>
          </ul>
        </div>
        <div class="pull-right">
          <span class="text-muted"><b>1</b>–<b>50</b> of <b>160</b></span>
          <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </button>
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-3 col-md-2">
        <a href="#" id="modalMP" class="btn btn-warning btn-block" role="button"><i class="glyphicon glyphicon-edit"></i> Nouveau</a>
        <hr>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#"><span class="badge pull-right">32</span> Reçus </a>
          </li>
          <li><a href="#">Marqués</a></li>
          <li><a href="#">Envoyés</a></li>
          <li><a href="#"><span class="badge pull-right">3</span>Brouillons</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-md-10">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
          </span>Boîte principale</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane fade in active" id="home">
            <div class="list-group">
              <a href="#" class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="checkbox">
                  </label>
                </div>
                <span class="glyphicon glyphicon-star-empty"></span>
		<span class="name" style="min-width:120px;display:inline-block;">Karl Réo</span>
		<span class="">Besoin du conseil d’un entrepreneur</span>
                <span class="text-muted">- Bonjour {{ Auth::user()->prenom }}, tu te rapelles…</span>
		<span class="badge">12:10 AM</span>
		<span class="pull-right">
		  <span class="glyphicon glyphicon-paperclip"></span>
		</span>
	      </a>
	      <a href="#" class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="checkbox">
                  </label>
                </div>
                <span class="glyphicon glyphicon-star-empty"></span>
		<span class="name" style="min-width:120px;display:inline-block;">Clément Perrault</span>
		<span class="">Un bail !</span>
		<span class="text-muted">- Hey ! Tu te souviens de moi ? :D..</span>
		<span class="badge">12:09 AM</span>
		<span class="pull-right">
		  <span class="glyphicon glyphicon-paperclip"></span>
		</span>
	      </a>
	      <a href="#" class="list-group-item read">
                <div class="checkbox">
                  <label>
                    <input type="checkbox">
                  </label>
                </div>
                <span class="glyphicon glyphicon-star"></span>
		<span class="name" style="min-width:120px;display:inline-block;">Louise Manceron</span>
		<span class="">Retrouvailles</span>
		<span class="text-muted">- Ça te dit de te retrouver avec les anciens de la 1ère SA ?</span>
		<span class="badge">11:30 PM</span>
		<span class="pull-right">
		  <span class="glyphicon glyphicon-paperclip"></span>
		</span>
	      </a>
            </div>
          </div>
          <div class="tab-pane fade in" id="profile">
            <div class="list-group">
              <div class="list-group-item">
                <span class="text-center">This tab is empty.</span>
              </div>
            </div>
          </div>
          <div class="tab-pane fade in" id="messages">
            ...</div>
          <div class="tab-pane fade in" id="settings">
            This tab is empty.</div>
        </div>
        
      </div>
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
  <script>
  $(document).ready(function(){
      $("#modalMP").click(function(){
          $("#modalCompose").modal('show');
      });
  });
  </script> 
@stop
