<?php

namespace App\Datatables;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Datatables\Interfaces\DatatableInterface;
use App\Models\Base;
use App\Models\Bot;
use App\Models\Category;
use App\Models\Response;
use App\Models\User;

class CompanyDatatable extends BaseDatatable implements DatatableInterface
{
    private CompanyRepository $company;

    public function __construct()
    {
        $this->company = new CompanyRepository();
    }

    public function elements(string $type = ''): array
    {
        //companies columns
        [$table_name, $single_name, $id, $name, $email, $web, $status] = $this->company->columns();

        $data = [];
        $data[self::URL] = $this->datatable_url($table_name);

        $columns = [];
        $columns[] = [self::HEADER => 'sr_no', self::DATA => self::TABLE_INDEX, self::SEARCHABLE => false, self::ORDERABLE => false];
        $columns[] = [self::HEADER => $name, self::DATA => $name, self::NAME => $table_name . '.' . $name];
        $columns[] = [self::HEADER => $email, self::DATA => $email, self::NAME => $table_name . '.' . $email];
        $columns[] = [self::HEADER => $web, self::DATA => $web, self::NAME => $table_name . '.' . $web];
        $columns[] = [self::HEADER => $status, self::DATA => $status, self::NAME => $table_name . '.' . $status];
        $columns[] = [self::HEADER => self::ACTION, self::DATA => self::ACTION, self::NAME => self::ACTION, self::SEARCHABLE => false, self::ORDERABLE => false];

        $unsets = [];
        foreach ($unsets as $value) {
            unset($columns[$value]);
        }
        $data[self::COLUMNS] = collect($columns)->values();
        return $data;
    }

}
