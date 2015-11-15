<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{{ $pageTitle }}}</title>

    @foreach (\SleepingOwl\Admin\AssetManager\AssetManager::styles() as $style)
      <link media="all" type="text/css" rel="stylesheet" href="{{ $style }}" >
    @endforeach

    <style>
    /* Override SleepingOwl all.min.css conflicts */
    .sidebar { width: inherit; margin-top: inherit; }
    .sidebar ul li { border: none; }
    .sidebar ul li a.active { background-color: transparent; }
    </style>

    @include('adminlte::_layout.css')

    @foreach (\SleepingOwl\Admin\AssetManager\AssetManager::scripts() as $script)
      <script src="{{ $script }}"></script>
    @endforeach
  </head>
  <body class="skin-red">
    @yield('content')

    @include('adminlte::_layout.js')
  </body>
</html>
