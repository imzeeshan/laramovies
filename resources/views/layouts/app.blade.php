<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="{{ route('home')}}">
                            <img
                                src="https://upload.wikimedia.org/wikipedia/commons/7/7e/Filmreel-icon.svg"
                                class="header-brand-img" width="25px;" height="25px;"
                                alt="LaraMovies"><strong> LaraMovies </strong>
                        </a>

                        <div class="d-flex order-lg-2 ml-auto">
                            @guest
                                <div class="nav-item d-none d-md-flex">
                                    <a class="btn btn-link" href="{{ route('login') }}">@lang('Login')</a>
                                </div>
                                <div class="nav-item d-none d-md-flex">
                                    <a class="btn btn-link" href="{{ route('register') }}">@lang('Register')</a>
                                </div>
                            @else
                            <div class="dropdown">
                                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                    <span class="avatar" style="background-image: url()"></span>
                                    <span class="ml-2 d-none d-lg-block">
                                    <span class="text-default">{{ auth()->user()->name }}</span>
                                        <small class="text-muted d-block mt-1">Administrator</small>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-settings"></i> Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="float-right"><span class="badge badge-primary">6</span></span>
                                        <i class="dropdown-icon fe fe-mail"></i> Inbox
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-send"></i> Message
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="dropdown-icon fe fe-log-out"></i> @lang('Sign out')
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            @endguest
                        </div>

                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>

        @auth
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ml-auto">
                            <form class="input-icon my-3 my-lg-0">
                                <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                                <div class="input-icon-addon">
                                    <i class="fe fe-search"></i>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                <li class="nav-item">
                                    <a href="{{ route('home')}}" class="nav-link {{ request()->is('home') ? 'active' : ''}}">
                                        <i class="fe fe-home"></i> Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link {{ request()->is('users') || request()->is('users/create') ||  request()->is('roles') || request()->is('roles/*') ? 'active' : ''}}" data-toggle="dropdown"><i class="fe fe-box"></i> Users</a>
                                    <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="{{ route('users.index')}}" class="dropdown-item ">All Users</a>
                                    <a href="{{ route('users.create')}}" class="dropdown-item ">Create a new User</a>
                                    <a href="{{ route('roles.index')}}" class="dropdown-item ">Roles</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="nav-link {{ request()->is('movies') ? 'active' : ''}}" data-toggle="dropdown"><i class="fe fe-calendar"></i> Movies</a>
                                    <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="{{ route('movies.index')}}" class="dropdown-item ">All Movies</a>
                                    <a href="{{ route('movies.create')}}" class="dropdown-item ">Create a new Movie</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="nav-link {{ request()->is('reviews') ? 'active' : ''}}" data-toggle="dropdown"><i class="fe fe-file"></i> Reviews</a>
                                    <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item active">All Reviews</a>                                  
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endauth



    
      

      

        <main class="py-4">
            @yield('content')
        </main>
    </div>

  
     @yield('custom_scripts')
    

</body>
</html>
