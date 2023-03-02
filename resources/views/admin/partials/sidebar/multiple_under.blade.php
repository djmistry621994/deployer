@if(\App\Lib\Route::can_see_submenu($value['values']))
    <li class="nav-main-item" data-menu="dropdown-submenu">
        <a class="nav-main-link nav-main-link-submenu {!! \App\Lib\Route::route_to_reply_submenu($value['values'],'open','') !!}" href="#nogo" data-toggle="dropdown">
            {!! $value['icon'] !!}
            <span class="nav-main-link-name">@lang($value['name'])</span>
        </a>
        <ul class="nav-main-submenu">
            @foreach($value['values'] as $element)
                @if(isset($element['values']))
                    @include('admin.partials.sidebar.multiple_under',['value'=>$element])
                @else
                    @include('admin.partials.sidebar.multiple_single',['value'=>$element])
                @endif
            @endforeach
        </ul>
    </li>
@endif
