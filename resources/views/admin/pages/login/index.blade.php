@extends('admin.layouts.auth')

@section('page_name', __('words.login'))

@section('content')
    <div class="p-sm-3 px-lg-4 py-lg-5">
        <h1 class="h2 mb-1">{!! config('app.name') !!}</h1>
        <p class="text-muted">
            @lang('messages.welcome_please_login')
        </p>

        {!! Form::open(['route' => 'login.store', 'id' => 'js--form']) !!}
        <div class="py-3">
            <div class="form-group">
                {!! Form::email(\App\Models\User::EMAIL, old(\App\Models\User::EMAIL), ['class' => 'form-control form-control-alt form-control-lg', 'placeholder' => __('words.email')]) !!}
                @if($errors->has(\App\Models\User::EMAIL))
                    <div class="invalid-feedback" style="display: block !important;">{!! $errors->first(\App\Models\User::EMAIL) !!}</div>
                @endif
            </div>
            <div class="form-group">
                {!! Form::password(\App\Models\User::PASSWORD, ['class' => 'form-control form-control-alt form-control-lg', 'placeholder' => __('words.password')]) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-xl-5">
                <button type="submit" class="btn btn-block btn-alt-primary">
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> @lang('words.login')
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{!! asset(mix('resources/js/admin/login.js')) !!}"></script>
@endsection
