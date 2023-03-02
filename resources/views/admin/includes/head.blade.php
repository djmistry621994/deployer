<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<title>@yield('page_name') | {!! config('app.name') !!}</title>

<meta name="description" content="@yield('page_name')">
<meta name="author" content="{!! config('app.name') !!}">
<meta name="robots" content="noindex, nofollow">

<meta property="og:title" content="{!! config('app.name') !!}">
<meta property="og:site_name" content="{!! config('app.name') !!}">
<meta property="og:description" content="@yield('page_name')">
<meta property="og:type" content="website">
<meta property="og:url" content="{!! route('home.index') !!}">
<meta property="og:image" content="">

<meta name="_token" content="{!! csrf_token() !!}"/>

<link rel="shortcut icon" href="assets/media/favicons/favicon.png">
<link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

<link rel="stylesheet" id="css-main" href="{!! asset(mix('resources/css/vendors.css')) !!}">

<link rel="stylesheet" id="css-main" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet" id="css-main" href="{!! asset(mix('resources/css/custom.css')) !!}">
