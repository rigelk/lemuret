@extends('vendor.installer.layouts.master')

@section('container')
      <!--   Big container   -->
      <div class="container">
	<div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            
            <!--      Wizard container        -->   
            <div class="wizard-container">
              
              <div class="card wizard-card ct-wizard-orange" id="wizardProfile">
		<form id="setup_form" action="{{ route('LaravelInstaller::finalPost') }}" method="post" content="{{ csrf_token() }}">{{ csrf_field() }}
                  <!--        You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
                  
                  <div class="wizard-header">
                    <h3>
                      <b>CRÉONS</b> VOTRE COMMUNAUTÉ<br>
                      <small>Ces informations vont nous aider à démarrer sur des bases saines.</small>
                    </h3>
                  </div>
                  <ul>
		    <li><a href="#info" data-toggle="tab">Informations</a></li>
                    <li><a href="#about" data-toggle="tab">Compte maître</a></li>
		    <li><a href="#account" data-toggle="tab">Votre base de données</a></li>
                    <li><a href="#address" data-toggle="tab">Inviter des élèves</a></li>
                  </ul>
                  
                  <div class="tab-content">
		    <div class="tab-pane" id="info">
                      <div class="row">
			<h4 class="info-text">Commençons par l’essentiel</h4>
			</br>
                        <div class="col-xs-10 col-xs-offset-1">
                          <div class="form-group">
                            <label>Nom du site <small>(requis)</small></label>
                            <input name="site_name" type="text" class="form-control" placeholder="Le Muret...">
                          </div>
			  <div>
			    
                            <div class="form-group">
                              <label>Nom de votre établissement <small>(requis)</small></label>
                              <input name="school_name" type="text" class="form-control" placeholder="La Perverie...">
                            </div>
			  </div>
                        </div>
                        <div class="col-xs-10 col-xs-offset-1">
                          <div class="form-group">
                            <label>Email administratif <small>(requis)</small></label>
                            <input name="email" type="email" class="form-control" placeholder="you@example.com">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="about">
                      <div class="row">
			<h4 class="info-text">Désignez un administrateur à la courte paille</h4>
		      </br>
                      <div class="col-xs-4 col-xs-offset-1">
			<div class="picture-container">
                          <div class="picture">
                            <img src="{{ asset('/img/default-avatar.png') }}" class="picture-src" id="wizardPicturePreview" title=""/>
                            <input type="file" id="wizard-picture">
                          </div>
                          <h6>Choisir une image?</h6>
			</div>
                      </div>
                      <div class="col-xs-6">
			<div class="form-group">
                          <label>Prénom <small>(requis)</small></label>
                          <input name="firstname" type="text" class="form-control" placeholder="Administration...">
			</div>
			<div class="form-group">
                          <label>Nom <small>(requis)</small></label>
                          <input name="lastname" type="text" class="form-control" placeholder="Smith...">
			</div>
                      </div>
                      <div class="col-xs-10 col-xs-offset-1">
			<div class="form-group">
                          <label>Email <small>(requis)</small></label>
                          <input name="email" type="email" class="form-control" placeholder="you@example.com">
			</div>
                      </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="account">
                      <h4 class="info-text"> Quelle type de base de données utilisez-vous ? </h4>
		      </br>
                      <div class="row">
			
			
			<div class="col-xs-10 col-xs-offset-1">
                          <div class="col-xs-4">
                            <div class="choice" data-toggle="wizard-radio">
                              <input type="radio" name="jobb" value="Design">
                              <div class="icon">
				<i class="fa fa-database"></i>
                              </div>
                              <h6>MySQL</h6>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="choice" data-toggle="wizard-radio">
                              <input type="radio" name="jobb" value="Code">
                              <div class="icon">
				<i class="fa fa-database"></i>
                              </div>
                              <h6>PostgreSQL</h6>
                            </div>
                            
                          </div>
                          <div class="col-xs-4">
                            <div class="choice" data-toggle="wizard-radio">
                              <input type="radio" name="jobb" value="Develop">
                              <div class="icon">
				<i class="fa fa-terminal"></i>
                              </div>
                              <h6>Locale</h6>
			      <small>évaluation/dev seulement</small>
                            </div>
                            
                          </div>
			</div>
			
                      </div>
                    </div>
                    <div class="tab-pane" id="address">
                      <div class="row">
			<div class="col-xs-12">
                          <h4 class="info-text"> …avec des fichiers d’anciens élèves, ou d’adresses mail. </h4>
			</div>
			<div class="col-xs-10 col-xs-offset-1">
			  <div class="panel-body">
			    <!-- Drop Zone -->
			    <div class="upload-drop-zone" id="drop-zone"> cliquez ou déposez ici vos fichiers </div>
			    <!-- Progress Bar -->
			    <div class="progress">
			      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"> <span class="sr-only">60% Complete</span> </div>
			    </div>
			  </div>
			</div>
		      </div>
		    </div>
		  </div>
		  <div class="wizard-footer">

		    <div class="pull-right">
		      <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Suivant' />
		      <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finaliser' />
		    </div>
		    
		    <div class="pull-left">
		      <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Précédent' />
		    </div>

		    <div class="clearfix"></div>
		    
		  </div>	
		</form>
	      </div>
	    </div> <!-- wizard container -->
	  </div>
	</div><!-- end row -->
      </div> <!--  big container -->

@stop
