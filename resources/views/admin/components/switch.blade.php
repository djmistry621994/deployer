<div class="form-group">
    <div class="d-inline-flex">
        <label class="d-block">@lang('words.status')</label>
        <div class="custom-control custom-switch custom-control-lg custom-control-inline ml-3">
            <input type="checkbox" class="custom-control-input js--switch" id="custom-switch-{!! $name !!}" name="{!! $name !!}" @if(isset($checked) && $checked) checked
                   @endif value="{!! $value !!}">
            <label class="custom-control-label" for="custom-switch-{!! $name !!}"></label>
        </div>
    </div>
    <div class="">
        <span id="js--error-text" style="color: red;"></span>
    </div>
</div>
