<?php

namespace App\Http\Requests\Legals;

use Illuminate\Foundation\Http\FormRequest;

class Filter extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
