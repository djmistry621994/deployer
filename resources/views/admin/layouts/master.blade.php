<!doctype html>
<html lang="en">
<head>
    @include('admin.includes.head')
</head>

<body>
<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    @include('admin.includes.header')

    @include('admin.includes.sidebar')

    @include('admin.includes.page_header')

    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="h3 font-w700 mb-2">
                            @yield('page_name')
                        </h1>
                    </div>
                    <div class="mt-3 mt-sm-0 ml-sm-3">
                        @yield('page_buttons')
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </main>

    @include('admin.includes.footer')

    @yield('popups')
</div>
@include('admin.includes.scripts')
</body>
</html>
