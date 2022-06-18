<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
    </li>
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('artists.index') }}">{{ __('Artists') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('songs.index') }}">{{ __('Songs') }}</a>
        </li>
    @endauth
</ul>
