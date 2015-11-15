<div class="navbar-custom-menu">
  <ul class="nav navbar-nav dropdown">
    <li>
      <a href="{{ url('/') }}">
        <span class="hidden-xs">Retour au Muret</span>
      </a>
    </li>
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs">{{ Auth::user()->prenom }} {{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
          <p>
            {{ Auth::user()->prenom }} {{ Auth::user()->name }}
            <small>Membre depuis le {{ $user->created_at->format('d F Y') }}</small>
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="{{ url('/profile/'.Auth::user()->id) }}" class="btn btn-default btn-flat">Profil</a>
          </div>
          <div class="pull-right">
            <a href="{{ Admin::instance()->router->routeToAuth('logout') }}" class="btn btn-default btn-flat">Déconnexion <i class="fa fa-sign-out"></i></a>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div>
