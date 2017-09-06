<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.partials._head')
</head>
<body>
    <div id="app">
        <section class="hero is-warning is-medium">
            <div class="hero-head">
                @include('layouts.partials._navigation')
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title is-1">
                        {{$tags->name}}
                    </h1>
                    @foreach($recipes as $recipe)
                        <h2 class="is-3">{{$recipe->name}}</h2>
                    @endforeach
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
