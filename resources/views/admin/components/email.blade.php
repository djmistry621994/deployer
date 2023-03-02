<div class="form-group">
    {!! Form::label($name, __('words.' . $label), ['class' => 'control-label']) !!}
    @if(isset($required) && $required)
        @include('admin.partials.required_sign')
    @endif
    @if(isset($extras['value']))
        {!! Form::email($name, $extras['value'], array_merge(['class' => 'form-control','placeholder'=> __('words.' . $label)], $attributes)) !!}
    @else
        {!! Form::email($name, old($name, request($name)), array_merge(['class' => 'form-control','placeholder'=> __('words.' . $label)], $attributes)) !!}
    @endif
    <div class="">
        <span id="js--error-text" style="color: red;"></span>
    </div>
</div>
