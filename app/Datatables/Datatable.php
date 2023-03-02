<?php


namespace App\Datatables;


use App\Models\Base;

class Datatable extends BaseDatatable
{

    public static function datatableElements($name, $inputs = [], $type = 1)
    {
        if (!isset($inputs['type'])) {
            $inputs['type'] = '';
        }
        $datatable = new DatatableFactory($name);
        $model_class = $datatable->make();
        $elements = $model_class->elements($inputs['type']);

        if ($type == 1) {
            return $elements[self::URL];
        } else if ($type == 2) {
            return self::datatable_headers($elements[self::COLUMNS]);
        } else {
            return self::datatable_contents($elements[self::COLUMNS]);
        }
    }

    private static function datatable_headers($columns)
    {
        $columns = collect($columns)->pluck(self::HEADER);
        return $columns->map(function ($item, $key) {
            return __('words.' . $item);
        });
    }

    private static function datatable_contents($columns)
    {
        $columns = collect($columns);
        return $columns->map(function ($item, $key) {
            return collect($item)->except(self::HEADER);
        });
    }

}
