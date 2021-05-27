<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'steamid' => 'required|unique:products,steamid'
        ];
    }

    public function messages(){
        return [
            'steamid.required' => 'Steamid not set.',
            'steamid.unique' => 'Steamid already exists.',
        ];
    }
}
