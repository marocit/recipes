<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/vue-multiselect/dist/vue-multiselect.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl/owl.theme.default.css') }}" rel="stylesheet">

<script src="{{ asset('js/tinymce.js') }}"></script>


<script>
    tinymce.init({
        selector: '#description',
        plugins: [
            'lists '
        ]
    });
</script>
