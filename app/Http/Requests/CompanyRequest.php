<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CompanyRequest
 * @package App\Http\Requests
 */
class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $company = $this->route('company');

        $rules = [
            'name' => ['required', 'string', 'regex:/^[\p{L}a-zA-Z\s]+$/u'],
            'email' => ['required', 'email'],
            'foundation_year' => ['required', 'date'],
            'description' => ['required', 'string'],
        ];

        if (!is_null($company)) {
            $rules['name'][] = Rule::unique('companies', 'name')->ignore($company->id);
            $rules['email'][] = Rule::unique('companies', 'email')->ignore($company->id);
        } else {
            $rules['name'][] = Rule::unique('companies', 'name');
            $rules['email'][] = Rule::unique('companies', 'email');
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.regex' => 'Field name must contain a string value',
        ];
    }
}
