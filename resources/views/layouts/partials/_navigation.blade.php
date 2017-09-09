<nav id="navbar-fixed" class="navbar is-transparent has-shadow m-b-50">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('home') }}" class="navbar-item is-brand">
                {{ config('app.name') }}
            </a>

            <div class="navbar-burger burger" data-target="navMenuTransparentExample">
              <span></span>
              <span></span>
              <span></span>
            </div>
        </div>


        <div id="navMenuTransparentExample" class="navbar-menu">
            <div class="navbar-end is-uppercase">
                @auth
                <a href="{{ route('account.recipes.index') }}" class="navbar-item">
                    Rezepte
                </a>
                <a href="{{ route('account.tag.index') }}" class="navbar-item">
                    Anlässe
                </a>
                <a href="{{ route('account.category.index') }}" class="navbar-item">
                    Kategorien
                </a>
                <a href="{{ route('account') }}" class="navbar-item">
                    Your Account
                </a>
                {{--  <a href="#" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                    Sign out
                </a>  --}}
                <a class="navbar-item is-hidden-desktop-only" href="https://twitter.com/jgthms" target="_blank" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                    <span class="icon" style="color: #7D8CA3;">
                    <i class="fa fa-sign-out"></i>
                    </span>
                </a>
            @endauth
            @guest

            <a href="{{ route('login') }}" class="navbar-item">
                Sign in
            </a>
            <a href="{{ route('register') }}" class="navbar-item">
                Register
            </a>
            @endguest
            </div>
        </div>
    </div>
</nav>

<form id="logout" action="{{ route('logout') }}" method="POST" class="is-hidden">
    {{ csrf_field() }}
</form>
