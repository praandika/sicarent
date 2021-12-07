<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('landing.page') }}" class="brand-link">
        <img src="{{ asset('icon/icon-white.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SIcarent</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            @if((Auth::user()->access == "admin") || (Auth::user()->access == "head"))
                <img src="{{ asset('avatar/icon-user-white.png') }}" class="img-circle elevation-2" alt="User Image">
            @elseif(Auth::user()->google_id == "")
                <img src="{{ asset('avatar/icon-user-white.png') }}" class="img-circle elevation-2" alt="User Image">
            @else
                <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <a href="#" class="d-block">{{ Auth::user()->access }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                    <a href="{{ route('landing.page') }}" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Homepage
                        </p>
                    </a>
                </li>

                @if((Auth::user()->access == "admin") || (Auth::user()->access == "head") || (Auth::user()->access == "user"))
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon far fa-chart-bar"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endif

                @if((Auth::user()->access == "admin") || (Auth::user()->access == "head"))
                <li class="nav-item">
                    <a href="{{ route('user.read') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->access == "admin")
                <li class="nav-item">
                    <a href="{{ route('car.read') }}" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Data Mobil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('damage.read') }}" class="nav-link">
                        <i class="fas fa-tools"></i>
                        <p>
                            Data Kerusakan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('return') }}" class="nav-link">
                        <i class="nav-icon fas fa-undo-alt"></i>
                        <p>
                            Pengembalian
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->access == "admin")
                <li class="nav-item">
                    <a href="{{ route('book.history') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Booking
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->access == "admin")
                <li class="nav-item">
                    <a href="{{ route('pay.history') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Data Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('calendar') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-week"></i>
                        <p>
                            Kalender
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->access == "head")
                <li class="nav-item">
                    <a href="{{ route('report') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->access == "admin")
                <li class="nav-item">
                    <a href="https://app.crisp.chat/website/d4026b60-c9b4-46b8-9de6-d01b2a88bdde/inbox/session_a46f7585-6c5a-4b92-b0e6-14aeb4749e71/" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Chat
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->access == "user")
                <li class="nav-item">
                    <a href="{{ route('book.history') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Booking History
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pay.history') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Payment History
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
