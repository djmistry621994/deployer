<?php

namespace App\Datatables;

class BaseDatatable
{
    const URL         = 'url';

    const DATATABLE   = 'datatable';

    const HEADER      = 'header';

    const DATA        = 'data';

    const NAME        = 'name';

    const TABLE_INDEX = 'DT_RowIndex';

    const SEARCHABLE  = 'searchable';

    const ORDERABLE   = 'orderable';

    const ACTION      = 'action';

    const COLUMNS     = 'columns';


    public function datatable_url($name)
    {
        return self::DATATABLE . '-' . $name;
    }
}
