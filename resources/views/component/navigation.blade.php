<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing.page') }}">Putra Bali Car<span> Rental</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('landing.page') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{ route('car.list') }}" class="nav-link">Cars</a></li>
                <li class="nav-item"><a href="#footer" class="nav-link">Contact</a></li>
                @if (Route::has('login'))
                    @auth
                    
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link">
                            @if(Auth::user()->access == "admin")
                            Dashboard
                            @elseif(Auth::user()->access == "head")
                            Dashboard
                            @else
                            Member Area
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
