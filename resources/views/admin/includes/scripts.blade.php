@include('admin.includes.php-js')

<script src="{!! asset(mix('resources/js/vendors.js')) !!}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{!! asset(mix('resources/js/common.js')) !!}"></script>

@if(session()->has('message') && session()->has('type'))
    <script>
        alert_showing('{!! session('message') !!}', '{!! session('type') !!}');
    </script>
@endif

@yield('scripts')
