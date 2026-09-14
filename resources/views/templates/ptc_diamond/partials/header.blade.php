<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="text-center">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-warning" href="{{ route('user.register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info" href="{{ route('user.login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info" href="{{ route('user.home') }}">Dashboard</a>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>
