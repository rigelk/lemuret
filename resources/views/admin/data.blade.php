<script href="{{{ asset('/js/Chart.min.js') }}}" type="text/javascript"></script>

@section('innerContent')
  <section class="content-header">
    <h1>Rapport de charge</h1>
  </section>
  <section class="content">

    <div class="row">

      <!-- COLUMN -->   
      <div class="col-sm-6 col-md-4">
        <!--
        ****** CHART WIDGET *******
        -->    
        <div id="pie-chart-widget" class="panel">
          <div class="panel-heading text-center">
            <h5 class="text-uppercase"><strong>Data Transfer</strong></h5>
          </div>
          <div class="panel-body">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="panel-footer">
            <div class="list-block">
              <ul class="text-center legend">
                <li class="video" style="margin-right: 1px;">
                  video 
                  <h2>62%</h2>
                </li>
                <li class="photo">
                  photo 
                  <h2>21%</h2>
                </li>
                <li class="audio" style="margin-left: 1px;">
                  audio 
                  <h2>10%</h2>
                </li>
              </ul>
            </div>
            <div class="btn-group btn-group-justified text-uppercase text-center">
              <a class="btn btn-default" role="button"><i class="fa fa-cloud-download fa-2x"></i><br><small>Point de <br> restauration</small></a>
              <a class="btn btn-default" role="button"><i class="fa fa-share fa-2x"></i><br><small>Télécharger</small></a>
              <a class="btn btn-default" role="button"><i class="fa fa-download fa-2x"></i><br><small>Back up complet</small></a>
            </div>
          </div>
        </div><!-- /#pie-chart-widget -->       
        
      </div>
      
      <div class="col-md-4 col-sm-6 col-xs-12">
	<div class="info-box">
	  <span class="info-box-icon bg-red"><i class="fa fa-database"></i></span>
	  <div class="info-box-content">
	    <span class="info-box-text">Taille du site</span>
	    <span class="info-box-number">700Mo</span>
	  </div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
	<div class="info-box">
	  <span class="info-box-icon bg-red"><i class="fa fa-share-alt-square"></i></span>
	  <div class="info-box-content">
	    <div id="placeholder"></div>
	  </div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
      </div>
      
    </div>

    <h3></h3>
    
    <div class="row">

      

    </div><!-- /.row -->
    
  </section>
@stop

@section('admin-js')
  @parent
  <script>
  $(document).ready(function() {
      
      var pie_data = [
	  {
              value: 300,
              color:"#4DAF7C",
              highlight: "#55BC75",
              label: "Video"
	  },
	  {
              value: 50,
              color: "#EAC85D",
              highlight: "#f9d463",
              label: "Audio"
	  },
	  {
              value: 100,
              color: "#E25331",
              highlight: "#f45e3d",
              label: "Photos"
	  },
	  {
              value: 35,
              color: "#F4EDE7",
              highlight: "#e0dcd9",
              label: "Remaining"
	  }
      ]
      // PIE CHART WIDGET
      var ctx = document.getElementById("myPieChart").getContext("2d");
      var myDoughnutChart = new Chart(ctx).Doughnut(pie_data,
	  {
              responsive:true, 
              tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %> Gb"
	  });

  });
  </script>
@stop

@section('admin-css')
  @parent
  <link href="{{ URL::asset('css/admin.data.css') }}" rel="stylesheet" type="text/css" />
@stop
