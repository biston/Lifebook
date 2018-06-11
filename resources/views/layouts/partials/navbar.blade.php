<nav class="navbar navbar-expand-md navbar-light facebook-bg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Social network') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <form class="form-inline">
                    <input class="form-control form-control-search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-default btn-search" type="submit"><i class="fa fa-search fa-search-nav" aria-hidden="true"></i></button>
                </form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link nav-link-text dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        <img src="https://fakeimg.pl/250x100/" class="avatar-sm rounded-circle  profile" width="20" height="20">
                            {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-text" href="#" title="Home">Home</i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Friends"><i class="fa fa-users" aria-hidden="true"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Messages"><i class="fa fa-comment" aria-hidden="true"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" title="Notifications"><i class="fa fa-globe" aria-hidden="true"></i></a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
