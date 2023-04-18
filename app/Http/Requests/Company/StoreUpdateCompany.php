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
        $id = $this->company;
        return [
            'category_id' => "required|exists:categories,id",
            'name'        => "required|min:3|max:255|unique:companies,name,{$id},id",
            'phone'       => "required|min:3|max:255|unique:companies,phone,{$id},id",
            'whatsapp'    => "nullable|min:3|max:255",
            'email'       => "required|email|unique:companies,email,{$id},id",
            'instagram'   => "nullable|min:3|max:255",
        ];
    }
}

