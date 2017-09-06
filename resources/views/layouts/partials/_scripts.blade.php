 <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('plugins/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/owl/owl.carousel.js') }}"></script>

