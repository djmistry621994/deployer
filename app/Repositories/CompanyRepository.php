<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    public Company $model;

    public function __construct()
    {
        $this->model = new Company();
    }

    //table names
    public function table_name()
    {
        return $this->model::TABLE_NAME;
    }

    public function single_name()
    {
        return $this->model::SINGLE_NAME;
    }

    //getters
    public function id()
    {
        return $this->model::ID;
    }

    public function name()
    {
        return $this->model::NAME;
    }

    public function email()
    {
        return $this->model::EMAIL;
    }

    public function web()
    {
        return $this->model::WEB;
    }

    public function status()
    {
        return $this->model::STATUS;
    }

    //all columns
    public function columns()
    {
        return [$this->table_name(), $this->single_name(), $this->id(), $this->name(), $this->email(), $this->web(), $this->status()];
    }

    public function datatable()
    {
        $model = $this->query();
        return $model;
    }

}
