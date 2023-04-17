<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|min:3|max:150|unique:companies',
            'name'        => 'required|min:3|max:255|unique:companies',
            'phone'       => 'required|min:3|max:255|unique:companies',
            'whatsapp'    => 'nullable|min:3|max:255|unique:companies',
            'email'       => 'required|email|unique:companies',
            'instagram'   => 'nullable|min:3|max:255|unique:companies',
        ];
    }
}

