<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Anoclassicsing</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{asset('/tables/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/tables/Bootstrap-4-4.1.1/css/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/tables/DataTables-1.10.21/css/dataTables.bootstrap4.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/tables/Buttons-1.6.2/css/buttons.bootstrap4.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/tables/SearchPanes-1.1.1/css/searchPanes.bootstrap4.css')}}"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Anoclassicsing
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('properties') }}">Properties</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>



<script type="text/javascript" src="{{asset('/tables/jQuery-3.3.1/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/Bootstrap-4-4.1.1/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/JSZip-2.5.0/jszip.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/pdfmake-0.1.36/pdfmake.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/DataTables-1.10.21/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/DataTables-1.10.21/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/Buttons-1.6.2/js/dataTables.buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/Buttons-1.6.2/js/buttons.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/Buttons-1.6.2/js/buttons.html5.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/Buttons-1.6.2/js/buttons.print.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/SearchPanes-1.1.1/js/dataTables.searchPanes.js')}}"></script>
<script type="text/javascript" src="{{asset('/tables/SearchPanes-1.1.1/js/searchPanes.bootstrap4.js')}}"></script>

<script>
    $('#myTable').DataTable();
</script>
</html>
