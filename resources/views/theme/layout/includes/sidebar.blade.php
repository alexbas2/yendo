<div id="sidebar" class="sidebar py-3">
    <li class="nav-item  ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link toggle"><img src="{{asset('theme/img/avatar-6.jpg')}}" alt="usuario" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
    </li>
    <div class="text-gray-500 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">{{auth()->user()->nombre}} {{auth()->user()->apellido}}</div>
    <div class="text-gray-600 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">Menu</div>
    
   <ul class="sidebar-menu list-unstyled">
        <li class="sidebar-list-item"><a href="{{route('home')}}" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
        <li class="sidebar-list-item"><a href="{{route('trip.misviajes')}}" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Mis viajes</span></a></li>
        <li class="sidebar-list-item"><a href="{{route('trip.create')}}" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Crear Viaje</span></a></li>
        <li class="sidebar-list-item"><a href="{{route('buscar')}}" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Buscar y Solicitar Viaje</span></a></li>
        <li class="sidebar-list-item"><a href="{{route('ranking')}}" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Mejores Usuarios</span></a></li>
        <li class="sidebar-list-item"><a href="{{route('trip.anuncio')}}" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Publicar Anuncio</span></a></li>


            <div id="pages" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page one</a></li>
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page two</a></li>
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page three</a></li>
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page four</a></li>
                </ul>
            </div>
        </li>


        <li class="sidebar-list-item">
            <a href="{{ route('logout') }}" class="sidebar-link text-muted" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                ><i class="o-exit-1 mr-3 text-gray"></i>
                <span>Salir</span></a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>

</div>
