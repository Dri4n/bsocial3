<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <link href="/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/css/icons.css" />
    <link rel="stylesheet" href="/css/index.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/lib/font-awesome.css">

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
        $campus = Session::get('campus_info')
    ?>

    @yield('head')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>


</head>
<body>
    <div id="app">
        @if (Auth::check())
            <header class="navbar navbar-inverse" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="/img/logo.png" alt="logo" />
                    </a>
                </div>
                <ul class="nav navbar-nav pull-right hidden-xs">
                    <li class="hidden-xs hidden-sm">
                        <input class="search" type="text" />
                    </li>
                    <li class="notification-dropdown hidden-xs hidden-sm">
                        <a href="#" class="trigger">
                            <i class="icon-warning-sign"></i>
                            <span class="count">8</span>
                        </a>
                        <div class="pop-dialog">
                            <div class="pointer right">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                                <div class="notifications">
                                    <h3>You have 6 new notifications</h3>
                                    <a href="#" class="item">
                                        <i class="icon-signin"></i> New user registration
                                        <span class="time"><i class="icon-time"></i> 13 min.</span>
                                    </a>
                                    <div class="footer">
                                        <a href="#" class="logout">View all notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="notification-dropdown hidden-xs hidden-sm">
                        <a href="#" class="trigger">
                            <i class="icon-envelope"></i>
                        </a>
                        <div class="pop-dialog">
                            <div class="pointer right">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                                <div class="messages">
                                    <a href="#" class="item">
                                        <img src="img/contact-img.png" class="display" alt="user" />
                                        <div class="name">Alejandra Galván</div>
                                        <div class="msg">
                                            There are many variations of available, but the majority have suffered alterations.
                                        </div>
                                        <span class="time"><i class="icon-time"></i> 13 min.</span>
                                    </a>
                                    <a href="#" class="item">
                                        <img src="img/contact-img2.png" class="display" alt="user" />
                                        <div class="name">Alejandra Galván</div>
                                        <div class="msg">
                                            There are many variations of available, have suffered alterations.
                                        </div>
                                        <span class="time"><i class="icon-time"></i> 26 min.</span>
                                    </a>
                                    <a href="#" class="item last">
                                        <img src="img/contact-img.png" class="display" alt="user" />
                                        <div class="name">Alejandra Galván</div>
                                        <div class="msg">
                                            There are many variations of available, but the majority have suffered alterations.
                                        </div>
                                        <span class="time"><i class="icon-time"></i> 48 min.</span>
                                    </a>
                                    <div class="footer">
                                        <a href="#" class="logout">View all messages</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href='/users/{{ Auth::user()->id }}'>
                                    Editar
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="settings hidden-xs hidden-sm">
                        <a href="personal-info.html" role="button">
                            <i class="icon-cog"></i>
                        </a>
                    </li>
                    <li class="settings hidden-xs hidden-sm">
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                              <i class="icon-share-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </header>
            <div id="sidebar-nav">
                <ul id="dashboard-menu">
                    <li class="active">
                        <div class="pointer">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <a href="/campus/{{$campus->id}}">
                            <i class="icon-home"></i>
                            <span>Campus</span>
                        </a>
                    </li>   
                </ul>
            </div>
            <div class="content">
                @yield('content')
            </div>
        @else 
             @yield('content')
        @endif

        

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <script type="text/javascript">
        $( function() {
            $(".date").datepicker();
            $(".date").datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
        });
    </script>
    @yield('scripts')

</body>
</html>
