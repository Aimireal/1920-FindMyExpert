<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}"> <i class="fa fa-address-book" aria-hidden="true"></i> FindMyExpert</a>
    <div class="collapse navbar-default navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('column-searching')}}">Browse Experts</a>
            </li>
            <li class="nav-item">
                @guest
                    <a class="nav-link disabled" href="{{route('home')}}">Add New</a>
                @else
                    <a class="nav-link" href="{{route('create')}}">Add New</a>
                @endguest
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ trans('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-id-badge" aria-hidden="true"></i> {{ trans('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Users Menu</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>