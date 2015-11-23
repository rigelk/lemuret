@extends('app')

@section('navbar')
  
@stop

@section('content')
  @include('profile.messages.messages-content')
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
