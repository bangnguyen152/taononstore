<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'full_name' =>[
                'bail',
                'required',
                'string',
                'unique:App\Models\User,full_name',
            ]
        ];
    }
    public function massages(){
        return [
            'required'=> 'Bắt buộc phải điền',
        ];
    }
}
