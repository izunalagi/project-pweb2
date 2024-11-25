<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand me-lg-5 me-0" href="index.html">
            <img src="{{ asset('frontend/images/nang.png') }}" class="logo-image img-fluid custom-logo"
                alt="templatemo pod talk">
        </a>


        <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
            <div class="input-group input-group-lg">
                <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
                    aria-label="Search">

                <button type="submit" class="form-control" id="submit">
                    <i class="bi-search"></i>
                </button>
            </div>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('catalouge.index') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        {{-- <li><a class="dropdown-item" href="listing-page.html">Listing Page</a></li> --}}

                        {{-- <li><a class="dropdown-item" href="detail-page.html">Detail Page</a></li> --}}

                        <li><a class="dropdown-item" href="{{ route('admin.dashboard.admin') }}">dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>
            {{-- @if (Route::has('login'))
                <div class="ms-4">
                    @auth
                        <a href="#section_3" class="btn custom-btn custom-border-btn smoothscroll">Get started</a>
                    @else
                        <a href="{{ route('login') }}" class="btn custom-btn custom-border-btn smoothscroll">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="btn custom-btn custom-border-btn smoothscroll">Register</a>
                        @endif
                    @endauth
                </div>

            @endif --}}
        </div>
    </div>
</nav>
