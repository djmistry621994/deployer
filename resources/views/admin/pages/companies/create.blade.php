@extends('admin.layouts.master')

@section('page_name')
    @if(isset($company))
        @lang('words.company_edit')
    @else
        @lang('words.company_create')
    @endif
@endsection

@section('page_buttons')
    @can('companies_sidebar')
        <a href="{!! route('admin.companies.index') !!}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>
        </a>
    @endcan
@endsection

@section('content')
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-6">
                    @if(isset($company))
                        {!! Form::model($company,['id'=>'js--form']) !!}
                        {!! Form::hidden('id',$company[\App\Models\Company::ID]) !!}
                    @else
                        {!! Form::open(['id'=>'js--form']) !!}
                    @endif

                    {!! Form::cText('name', 'name', [], true) !!}
                    {!! Form::cEmail('email', 'email', [], true) !!}
                    {!! Form::cText('web', 'web', [], true) !!}

                    @if(isset($company) && $company[\App\Models\Company::STATUS] == \App\Enums\Status::ACTIVE)
                        {!! Form::cSwitch('words.status', 'status', \App\Enums\Status::ACTIVE, true) !!}
                    @else
                        {!! Form::cSwitch('words.status', 'status', \App\Enums\Status::ACTIVE) !!}
                    @endif

                    <button class="btn btn-secondary">@lang('words.submit')</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var show_page = false;
    </script>
    @if(isset($company) && $show_page)
        <script>
            show_page = true;
        </script>
    @endif
    <script src="{!! asset(mix('resources/js/admin/company_create.js')) !!}"></script>
@endsection
