@if($value['permission'] == '' || \App\Lib\Route::hasAnyPermission($value['permission']))
    @php
        $url = 'javascript;';
        $class= $id = '';
        if(isset($value) && isset($value['route']) && $value['route']!=''){
            $params = [];
            if(isset($value['extra_params'])){
                $params = $value['extra_params'];
            }
            $url = route($value['route'], $params);
        }
        if(isset($value) && isset($value['class']) && $value['class']!=''){
            $class = $value['class'];
        }
        if(isset($value) && isset($value['id']) && $value['id']!=''){
            $id = $value['id'];
        }
    @endphp

    <li class="nav-main-item @if(isset($value['extra_params'])){!! \App\Lib\Route::route_to_reply_able($value['active_routes'],$value['extra_params']) !!} @else{!! \App\Lib\Route::route_to_reply_able($value['active_routes']) !!} @endif">
        <a class="nav-main-link {!! $class !!}" id="{!! $id !!}" href="{!! $url !!}">
            <span class="nav-main-link-name">
                @lang($value['name'])
                @if(isset($value['extra_id']))
                    ({!! ${$value['extra_id']} !!})
                @endif
            </span>
        </a>
    </li>
@endif
