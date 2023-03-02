<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Services\CompanyService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    private CompanyService $company;

    public function __construct()
    {
        $this->company = new CompanyService();
    }

    public function index()
    {
        $data = $this->company->index();
        return view('admin.pages.companies.index', $data);
    }

    public function create()
    {
        $data = $this->company->create();
        return view('admin.pages.companies.create', $data);
    }

    public function edit(Company $company, $show_page = false)
    {
        $data = $this->company->create($company, $show_page);
        return view('admin.pages.companies.create', $data);
    }

    public function show(Company $company)
    {
        return $this->edit($company, true);
    }

    public function datatable()
    {
        return $this->company->datatable();
    }

    public function store(CompanyRequest $request)
    {
        $inputs = $this->company->inputs();
        $model = $this->company->model();
        if ($model != null) {
            $this->company->update($model, $inputs);
            $this->company->success('messages.updated_successfully', ['name' => 'words.company']);
        } else {
            $this->company->store($inputs);
            $this->company->success('messages.created_successfully', ['name' => 'words.company']);
        }

        $data = [];
        $data['status'] = true;
        $data['redirect'] = route('admin.companies.index');
        return $data;
    }

    public function destroy(Company $company)
    {
        return [
            'status' => $this->company->destroy($company),
        ];
    }
}
