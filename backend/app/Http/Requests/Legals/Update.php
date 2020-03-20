<?php

namespace App\Http\Requests\Legals;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'inn' => [
                'required',
                Rule::unique('legals')->where(function ($query) {
                    return $query->where('inn', $this->input('inn'))
                        ->where('kpp', $this->input('kpp'));
                })->ignore($this->input('id')),
            ],
            'ogrn' => 'required|string',
            'address' => 'required|string',
            'full_name' => 'required|string',
            'name' => 'required|string',
            'contacts.*.name' => 'required|string',
        ];
    }
}
