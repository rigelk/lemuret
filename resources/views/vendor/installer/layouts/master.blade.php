<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('messages.title') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/vendor/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Installer Style -->
    <link href="{{ asset('css/installer.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="height:100vh;">
  <div class="image-container" style="background-image: url('/img/muret.jpg'); position:absolute; width: 100vw; filter: grayscale(100);"></div>
  <div class="set-full-height">
    @yield('container')
  </div>
</body>
      
<script src="{{ asset('js/vendor.js') }}" type="text/javascript"></script>
<!--   plugins 	 -->
<script src="{{ asset('js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
<!--  methods for manipulating the wizard and the validation -->
<script src="{{ asset('js/wizard.js') }}" type="text/javascript"></script>

</html>

