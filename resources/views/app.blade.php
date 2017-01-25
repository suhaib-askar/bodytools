<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/tether.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/tether-theme-arrows-dark.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.css" >
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}" >--}}

    @yield('stylesheets')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
    </script>
    @yield('scripts')


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div>
    <nav class="nav has-shadow">
        <div class="nav-left">
            <!-- Collapsed Hamburger-->
            <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </span>

            <!-- Branding Image -->
            <a class="nav-item" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="nav-center">
            <a class="nav-item" href="/log">
                <span class="icon">
                    <i class="fa fa-book"></i>
                </span>
            </a>
            <a class="nav-item" href="/progress">
                <span class="icon">
                    <i class="fa fa-line-chart"></i>
                </span>
            </a>
        </div>

        <!-- Right Side Of Navbar -->
        <div class="nav-right nav-menu">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <a class="nav-item" href="{{ url('/login') }}">Login</a>
                <a class="nav-item" href="{{ url('/register') }}">Register</a>
            @else
                <span class="nav-item">
                    <a href="#profile" class="button">
                        {{ Auth::user()->name }}
                    </a>
                </span>
                <span class="nav-item">
                    <a class="button is-primary" href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </span>
            @endif
        </div>
    </nav>
    @yield('content')



</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="js/axios.js"></script>
<script src="js/vue.js"></script>
{{--<script src="js/tether.min.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/app.js"></script>--}}

@yield('blocking-scripts')
</body>
</html>