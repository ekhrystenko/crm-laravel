<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ClientRequest
 * @package App\Http\Requests
 */
class ClientRequest extends FormRequest
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
        $client = $this->route('client');

        $rules = [
            'name' => ['required', 'string', 'regex:/^[\p{L}a-zA-Z\s]+$/u'],
            'surname' => ['required', 'string', 'regex:/^[\p{L}a-zA-Z\s]+$/u'],
            'email' => ['required', 'email'],
        ];

        if (!is_null($client)) {
            $rules['email'][] = Rule::unique('clients', 'email')->ignore($client->id);
        } else {
            $rules['email'][] = Rule::unique('clients', 'email');
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
            'name.surname' => 'Field surname must contain a string value',
        ];
    }
}
