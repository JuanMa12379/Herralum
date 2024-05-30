<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
      <img src="{{asset('admin/images/Logo_vitrelum.png')}}" width="220px" >
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin/lista_usuarios')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio
                
              </p>
            </a>
            
          </li>
          <li class="nav-header">CONTENIDO</li>
          <li class="nav-item">
            <a href="{{url('admin/lista_banners')}}" class="nav-link">
            <i class="nav-icon far fa-image"></i>
              <p>
                Banners
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/lista_marcas')}}" class="nav-link">
            <i class="nav-icon far fa-image"></i>
              <p>
                Marcas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/lista_tips')}}" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
              <p>
                Tips
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/lista_categorias')}}" class="nav-link">
            <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
                Categorias
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/lista_productos')}}" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Productos
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/lista_proyectos')}}" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Proyectos
                
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>