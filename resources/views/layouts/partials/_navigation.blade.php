<nav id="navbar-fixed" class="navbar is-transparent m-b-50">
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
            <div class="navbar-end">
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


                <a href="#" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                    Sign out
                </a>

                <a href="{{ route('account') }}" class="navbar-item">
                    Your Account
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
