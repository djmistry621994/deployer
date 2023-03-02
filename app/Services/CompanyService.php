<?php

namespace App\Services;

use App\Enums\Status;
use Yajra\DataTables\DataTables;
use App\Services\Traits\SessionTrait;
use App\Repositories\CompanyRepository;
use App\Services\Traits\DatatableTrait;

class CompanyService extends BaseService
{
    use SessionTrait, DatatableTrait;

    private CompanyRepository $company;

    public function __construct()
    {
        $this->company = new CompanyRepository();
    }

    public function single_name()
    {
        return $this->company->single_name();
    }

    public function datatable()
    {
        return DataTables::of($this->company->datatable())
            ->editColumn($this->company->status(), function ($row) {
                $status = $row[$this->company->status()];
                return $this->status($status, '', '');
            })
            ->addColumn('action', function ($row) {
                $table_name = $this->company->table_name();
                $single_name = $this->company->single_name();

                $id = $row[$this->company->id()];

                $str = [];
                $url = route('admin.companies.show', $id);
                $str[] = $this->show_button($table_name, $url);
                $url = route('admin.companies.edit', $id);
                $str[] = $this->edit_button($table_name, $url);
                $url = route('admin.companies.destroy', $id);
                $str[] = $this->delete_button($table_name, $single_name, $url);
                return $this->concat_buttons($str);
            })
            ->rawColumns([$this->company->status(), 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create($company = null, $show_page = false)
    {
        $data = [];
        if ($company != null) {
            $data[$this->company->single_name()] = $company;
        }
        $data['show_page'] = $show_page;
        return $data;
    }

    public function model()
    {
        return $this->company->find(request('id'));
    }

    public function inputs()
    {
        $inputs = request()->only([
            $this->company->name(),
            $this->company->email(),
            $this->company->web(),
        ]);
        $inputs[$this->company->status()] = Status::INACTIVE;
        if (request($this->company->status())) {
            $inputs[$this->company->status()] = Status::ACTIVE;
        }
        return $inputs;
    }

    public function store($inputs)
    {
        return $this->company->create($inputs);
    }

    public function update($model, $inputs)
    {
        return $this->company->update($model, $inputs);
    }

    public function destroy($model)
    {
        return $this->company->delete($model);
    }
}
