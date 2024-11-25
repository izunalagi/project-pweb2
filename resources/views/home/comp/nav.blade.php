<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">Deluxe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home.index') }}" class="nav-link">Home</a></li>
                <li class="nav-item {{ request()->is('rooms') ? 'active' : '' }}"><a href="{{ route('home.rooms') }}" class="nav-link">Rooms</a></li>
                <li class="nav-item {{ request()->is('restaurant') ? 'active' : '' }}"><a href="{{ route('home.restaurant') }}" class="nav-link">Restaurant</a></li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('home.about') }}" class="nav-link">About</a></li>
                <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}"><a href="{{ route('home.blog') }}" class="nav-link">Blog</a></li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('home.contact') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
