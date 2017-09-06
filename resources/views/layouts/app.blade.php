<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.partials._head')
</head>
    <body>
        <div id="app">
            @include('layouts.partials._navigation')
            @yield('content')
        </div>

        @include('layouts.partials._scripts')
        @yield('scripts')


<!-- <script>
    var App = new Vue({
    el: '#app',
    props: ['test'],
    data: {
        test: '',
    },
    methods: {
        DeleteTag(){

        }
    }

    })
</script> -->
    </body>
</html>
