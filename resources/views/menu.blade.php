<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables" @yield('menu')>
    <a class="nav-link" href="{{asset('/index.php/Menu')}}">
      <i class="fa fa-fw fa-list-ol"></i>
      <span class="nav-link-text">Menu</span>
    </a>
  </li>
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables" @yield('ingrediente')>
    <a class="nav-link" href="{{asset('/index.php/Ingrediente')}}">
      <i class="fa fa-fw fa-shopping-basket"></i>
      <span class="nav-link-text">Ingrediente</span>
    </a>
  </li>
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables" @yield('tiempo')>
    <a class="nav-link" href="{{asset('/index.php/Tiempo')}}">
      <i class="fa fa-fw fa-clock"></i>
      <span class="nav-link-text">Tiempo</span>
    </a>
  </li>
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables" @yield('grupo')>
    <a class="nav-link" href="{{asset('/index.php/Grupo')}}">
      <i class="fa fa-fw fa-table"></i>
      <span class="nav-link-text">Grupo</span>
    </a>
  </li>
</ul>
