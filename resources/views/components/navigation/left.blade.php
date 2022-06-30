<ul class="navbar-nav me-auto">
    <li class="nav-item {{request()->routeIs('home') ? "active" : ""}}">
        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
    </li>
    @auth
        <li class="nav-item {{request()->routeIs('artists.index') ? "active" : ""}}">
            <a class="nav-link" href="{{ route('artists.index') }}">{{ __('Artists') }}</a>
        </li>
        <li class="nav-item {{request()->routeIs('categories.index') ? "active" : ""}}">
            <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
        </li>
        <li class="nav-item {{request()->routeIs('songs.index') ? "active" : ""}}">
            <a class="nav-link" href="{{ route('songs.index') }}">{{ __('Songs') }}</a>
        </li>
    @endauth
</ul>
