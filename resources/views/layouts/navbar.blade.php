<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation" style="background-color: white; box-shadow: 0px 1px 6px 0px #00000061;">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <img src="{{ asset('image/Laravel_logo.png') }}" width="120">
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item has-text-dark" id="navbar-hover" href="{{ route('transaction.index') }}">
                    <span class="icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </span>
                    &nbspLog Transaksi
                </a>
                <div class="navbar-item">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link has-text-dark">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            &nbsp{{ Auth::user()->name }}
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                <span class="icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                &nbsp{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
