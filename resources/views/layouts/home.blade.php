<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.partials._head')
</head>
<body>
    <div id="app">
        <section id="rezept-bg" class="hero is-warning is-medium">
            <div class="primary-overlay">
                <div class="hero-head">
                @include('layouts.partials._navigation')
                </div>
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <h1 class="title is-1 has-text-white is-uppercase">
                            Rezepte
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>

    </div>

    @include('layouts.partials._scripts')
</body>
</html>
