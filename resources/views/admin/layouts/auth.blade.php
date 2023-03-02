<!doctype html>
<html lang="en">
<head>
    @include('admin.includes.head')
</head>

<body>
<div id="page-container">
    <main id="main-container">
        <div class="hero-static">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="block block-rounded block-themed mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">@lang('words.login')</h3>
                            </div>
                            <div class="block-content">
                                @yield('content')
                            </div>
                        </div>
                </div>
            </div>
            <div class="content content-full font-size-sm text-muted text-center">
                <strong>{!! config('app.name') !!}</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
        </div>
    </main>
</div>

@include('admin.includes.scripts')
</body>
</html>
