<?php

namespace App\Services;

use App\Datatables\Datatable;

class BaseService
{
    public function index($type = '')
    {
        $single_name = $this->single_name();
        $data = [];
        $data['datatable_url'] = Datatable::datatableElements(ucwords($single_name), ['type' => $type], \App\Enums\Datatable::URL);
        $data['datatable_headers'] = Datatable::datatableElements(ucwords($single_name), ['type' => $type], \App\Enums\Datatable::HEADERS);
        $data['datatable_columns'] = Datatable::datatableElements(ucwords($single_name), ['type' => $type], \App\Enums\Datatable::COLUMNS);
        return $data;
    }
}
