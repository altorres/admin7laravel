<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <a href="{{route('home')}}" class="brand-link">
         <img src="{{url(\App\Parametrizacion::first()->imagenP)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" >
        <span class="brand-text font-weight-light">{{\App\Parametrizacion::first()->nameL}}</span>
    </a>
    <!-- Sidebar -->

    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        @if(\App\Parametrizacion::first()->mostrarS == "si")

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url(\App\Parametrizacion::first()->imagenS)}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
                </div>
            </div>

        @endif
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>

                </li>
                @can('haveaccess','user.index')
                    <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                              Usuarios
                        </p>
                    </a>

                </li>
                @endcan
                @can('haveaccess','role.index')
                <li class="nav-item">
                    <a href="{{route('role.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Roles

                        </p>
                    </a>
                </li>
                @endcan


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
