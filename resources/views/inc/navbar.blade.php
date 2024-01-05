<header>
    <div class="container">        
        <a href="{{ route('home') }}" class="logo-container">
            <img class="logo" src="{{asset('storage/images/logo.png')}}" width="100px">
        </a>
        
        <img id="menu-open" src="{{asset('storage/images/bars.svg')}}">
        
        <nav>
            <img id="menu-close" src="{{asset('storage/images/times.svg')}}">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ul>
            <ul>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @else
                    <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
                       Logout
                    </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>          
    </div>
</header>