@extends('admin.layouts.master')

@section('page_name', __('words.companies'))

@section('page_buttons')
    @can('companies_create')
        <a href="{!! route('admin.companies.create') !!}" class="btn btn-secondary">
            <i class="fa fa-plus"></i>
        </a>
    @endcan
@endsection

@section('content')
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="js--index-datatable">
                <thead>
                <tr>
                    @foreach($datatable_headers as $value)
                        <th>{!! $value !!}</th>
                    @endforeach
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var datatable_url = '{!! $datatable_url !!}';
        var datatable_columns = {!! json_encode($datatable_columns) !!};
    </script>
    <script src="{!! asset(mix('resources/js/admin/companies.js')) !!}"></script>
@endsection
