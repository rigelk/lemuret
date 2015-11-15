@section('innerContent')
  <section class="content-header">
    <h1>Résumé de l’activité</h1>
  </section>
  <section class="content">

    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
	<div class="info-box bg-red">
	  <span class="info-box-icon"><i class="fa fa-users"></i></span>
	  <div class="info-box-content">
	    <span class="info-box-text">Inscrits</span>
	    <span class="info-box-number">34</span>
	    <div class="progress">
	      <div class="progress-bar" style="width: 70%"></div>
	    </div>
	    <span class="progress-description">
	      70% de progression en 30 jours
	    </span>
	  </div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
	<div class="info-box">
	  <span class="info-box-icon bg-red"><i class="fa fa-database"></i></span>
	  <div class="info-box-content">
	    <span class="info-box-text">Taille du site</span>
	    <span class="info-box-number">700Mo</span>
	    <div class="progress" style="height: 0px;">
	      <div class="progress-bar" style="width: 0%;"></div>
	    </div>
	    <span class="pull-right">
	      Gérer l’occupation <i class="fa fa-long-arrow-right"></i>
	    </span>
	  </div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
	<div class="info-box">
	  <span class="info-box-icon bg-red"><i class="fa fa-share-alt-square"></i></span>
	  <div class="info-box-content">
	    <span class="info-box-text">Utilisateurs sociaux</span>
	    <span class="info-box-number">14</span>
	  </div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
      </div>
      
    </div>

    <h3>Opérations requérant votre intervention</h3>
    
    <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12">
	<div class="box box-danger">
	  <div class="box-header with-border">
	    <h3 class="box-title">Nouveaux inscrits</h3>
	    <div class="box-tools pull-right">
	      <div class="has-feedback">
		<input type="text" class="form-control input-sm" placeholder="Rechercher parmi eux…"/>
		<span class="glyphicon glyphicon-search form-control-feedback"></span>
	      </div>
	    </div><!-- /.box-tools -->
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <p>Les utilisateurs suivants se sont inscrits d’eux-mêmes et doivent être vérifiés en tant que véritables anciens élève de votre établissement.</p>
	    <table class="table table-condensed">
	      <thead>
		<tr>
		  <th>Nom</th>
		  <th>Année de diplôme</th>
		  <th class="pull-right">Action</th>
		</tr>
	      </thead>
	      <tbody>
		@foreach ($users_pending as $user)
		  <tr>
		    <td>{{ $user->prenom }} {{ $user->name }}</td>
		    <td>1997</td>
		    <td class="text-right">

		      <div class="btn-group" role="group" aria-label="...">
			<button type="button" class="btn btn-xs btn-success">Accepter</button>
			<button type="button" class="btn btn-xs btn-default">Détails</button>

			<div class="btn-group" role="group">
			  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			    Plus
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			  <li><a href="#"><i class="fa fa-ban"></i>Refuser</a></li>
			  <li><a href="#"><i class="fa fa-tty"></i>Contacter</a></li>
			  </ul>
			</div>
		      </div>
		      
		    </td>
		  </tr>
		@endforeach
		<tr>
		  <td>Laurence Daraby</td>
		  <td>1990</td>
		  <td class="text-right">

		    <div class="btn-group" role="group" aria-label="...">
		      <button type="button" class="btn btn-xs btn-success">Accepter</button>
		      <button type="button" class="btn btn-xs btn-default">Détails</button>

		      <div class="btn-group" role="group">
			<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			  Plus
			  <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
			  <li><a href="#"><i class="fa fa-ban"></i>Refuser</a></li>
			  <li><a href="#"><i class="fa fa-tty"></i>Contacter</a></li>
			</ul>
		      </div>
		    </div>
		    
		  </td>
		</tr>
	      </tbody>
	    </table>
	  </div><!-- /.box-body -->
	</div><!-- /.box -->
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
	<div class="box box-danger">
	  <div class="box-header with-border">
	    <h3 class="box-title">Nouveaux inscrits</h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <div style="height:200px;" id="placeholder"></div><!-- GRAPHE -->
	  </div><!-- /.box-body -->
	</div><!-- /.box -->
      </div>

      
    </div>
    
  </section>
@stop

@section('admin-js')
  @parent
  <script>
  /*
   * Play with this code and it'll update in the panel opposite.
   *
   * Why not try some of the options above?
   */
  months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
  Morris.Line({
      element: 'placeholder',
      data: [
	  { month: '2010-01', a: 100, b: 90 },
	  { month: '2010-02', a: 75,  b: 65 },
	  { month: '2010-03', a: 50,  b: 40 },
	  { month: '2010-04', a: 75,  b: 65 },
	  { month: '2010-05', a: 50,  b: 40 },
	  { month: '2010-06', a: 75,  b: 65 },
	  { month: '2010-07', a: 100, b: 90 }
      ],
      xkey: 'month',
      ykeys: ['a'],
      labels: ['Nouveaux inscrits'],
      hideHover: 'auto',
      //goals: [60, 40],
      xLabelFormat: function (x) { return months[x.getMonth()]; }
  });

  </script>
@stop
