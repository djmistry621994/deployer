@if($value['permission'] == '' || \App\Lib\Route::hasAnyPermission($value['permission']))
    <li class="nav-main-item
        @if(isset($value['extra_params'])) {!! \App\Lib\Route::route_to_reply_able($value['active_routes'], $value['extra_params']) !!} @else{!! \App\Lib\Route::route_to_reply_able($value['active_routes']) !!} @endif
        ">
        @php
            $url = 'javascript;';
            $class = '';
            if(isset($value) && isset($value['route']) && $value['route']!=''){
                $params = [];
                if(isset($value['extra_params'])){
                    $params = $value['extra_params'];
                }
                if(isset($value['extra_route_params'])){
                    $params = $value['extra_route_params'];
                }
                $url = route($value['route'], $params);
            }
            if(isset($value) && isset($value['class']) && $value['class']!=''){
                $class = $value['class'];
            }
        @endphp
        <a class="nav-main-link {!! $class !!}" href="{!! $url !!}">
            @if(isset($value['icon']))
                {!! $value['icon'] !!}
            @else
                <i class="nav-main-link-icon si si-speedometer"></i>
            @endif
            <span class="nav-main-link-name">
                @lang($value['name'])
                @if(isset($value['extra_id']))
                    ({!! ${$value['extra_id']} !!})
                @endif
            </span>
        </a>
    </li>
@endif
