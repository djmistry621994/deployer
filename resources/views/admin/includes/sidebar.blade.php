<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        <a class="font-w600 text-dual" href="{!! route('admin.home.index') !!}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">
                {!! config('app.name') !!}
            </span>
        </a>
    </div>

    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                @foreach(config('admin_sidebar') as $element)
                    @if(isset($element['values']))
                        @include('admin.partials.sidebar.multiple',['value' => $element])
                    @else
                        @include('admin.partials.sidebar.single',['value' => $element])
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
