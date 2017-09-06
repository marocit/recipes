<nav class="nav">
    <div class="container">
        <div class="nav-left">
            <a href="{{ route('home') }}" class="nav-item is-brand">
                {{ config('app.name') }}
            </a>

        </div>

        <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </span>

        <div class="nav-right nav-menu">
            @auth
                <a href="{{ route('account.recipes.index') }}" class="nav-item">
                    Rezepte
                </a>
                <a href="{{ route('account.tag.index') }}" class="nav-item">
                    Anlässe
                </a>
                <a href="{{ route('account.category.index') }}" class="nav-item">
                    Kategorien
                </a>


                <a href="#" class="nav-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                    Sign out
                </a>

                <a href="{{ route('account') }}" class="nav-item">
                    Your Account
                </a>
            @endauth
            @guest

            <a href="{{ route('login') }}" class="nav-item">
                Sign in
            </a>
            <a href="{{ route('register') }}" class="nav-item">
                Register
            </a>
            @endguest
        </div>
    </div>
</nav>

<form id="logout" action="{{ route('logout') }}" method="POST" class="is-hidden">
    {{ csrf_field() }}
</form>
