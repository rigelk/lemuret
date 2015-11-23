<script href="{{{ asset('/js/Chart.min.js') }}}" type="text/javascript"></script>

@section('innerContent')
  <section class="content-header">
    <h1>Configuration du site</h1>
  </section>
  <section class="content">

    <div class="row">
      
    </div>
    
  </section>
@stop

@section('admin-js')
  @parent
  <script>
  </script>
@stop

@section('admin-css')
  @parent
  <link href="{{ URL::asset('css/admin.data.css') }}" rel="stylesheet" type="text/css" />
@stop
