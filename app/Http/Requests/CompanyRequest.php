<?php

namespace App\Http\Requests;

use App\Repositories\CompanyRepository;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(CompanyRepository $company_repo)
    {
        [$table_name, $single_name, $id, $name, $email, $web, $status] = $company_repo->columns();

        return [
            $name  => "required|unique:$table_name,$name," . request('id'),
            $email => "required|email",
            $web   => "required|url",
        ];
    }
}
