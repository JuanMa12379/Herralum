<!-- Barra de navegación secundaria -->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-secondary">
    <div class="container-fluid d-flex justify-content-end">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('proyectos')}}">Proyectos</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{url('contacto')}}">Contacto</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Barra de navegación principal -->
  <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="{{url('/')}}" class="navbar-brand home"><img src="{{asset('img/logo.png')}}" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/logo.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">

              <ul class="nav navbar-nav ml-auto">
              @foreach($categorias as $cat)
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="dropdown-toggle" >{{$cat->nombre}}</a>
                  <ul class="dropdown-menu megamenu">
                  
                    <li>
                      <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6">
                        <h5><a href="{{url('categoria/'.$cat->slug)}}" style="text-decoration: none; color: #21BFFF;">{{$cat->nombre}}</a></h5>
                          <ul class="list-unstyled mb-3">
                          @foreach ($cat->productos as $producto) 
                          <ul class="list-unstyled mb-3">
                            <li class="list-unstyled mb-3 "><a href="{{url('detalle_producto/'.$cat->slug.'/'.$producto->slug)}}" class="nav-link">{{$producto->nombre}}</a></li>
                            @endforeach

                          </ul>
                        </div>
                        <div class="col-lg-6"><img src="{{asset('uploads/categorias/'.$cat->imagen)}}" alt="" class="img-fluid d-none d-lg-block"></div>
                      </div>
                    </li>
                  
                  </ul>
                </li>
                @endforeach
                <!-- ========== FULL WIDTH MEGAMENU ==================-->
            </ul>
            </div>
          </div>
        </div>
      </header>
      <!-- Navbar End-->