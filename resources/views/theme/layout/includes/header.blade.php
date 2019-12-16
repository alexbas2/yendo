@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
    <a href="/home" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
    
    </a><a href="/home" class="navbar-brand font-weight-bold text-uppercase text-base">Unco.Yendo</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">

            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{{asset('theme/img/avatar-6.jpg')}}" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
                <div aria-labelledby="userInfo" class="dropdown-menu"><a href="/" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">Mark Stephen</strong><small>Web Developer</small></a>
                    <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
                    <div class="dropdown-divider"></div><a href="login.html" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
@else
<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="/home" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
    
    </a><a href="/home" class="navbar-brand font-weight-bold text-uppercase text-base">Unco.Yendo</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
            <li>
            <a href="{{ route('login') }}"> Login  </a> 
            </li>
            <li>
            <a href="{{ route('register') }}">  Registrarse</a>
            </li>
        </ul>
    </nav>
</header>
                        

@if (Route::has('register'))
        
                        @endif
                    @endauth
                </div>
            @endif