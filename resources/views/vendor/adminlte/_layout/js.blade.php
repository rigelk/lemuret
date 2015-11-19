<script src="{{ URL::asset('js/vendor.js') }}" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ URL::asset('js/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/jquery.knob.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/fastclick.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/app.min.js') }}" type="text/javascript"></script>

@section('admin-js')
  <script>
  jQuery(document).ready(function($) {
      $('.dropdown-toggle').dropdown();
  });
  </script>
@show
