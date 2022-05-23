<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'ar.name'=>'required|unique:product_translations,name',
            'en.name'=>'required|unique:product_translations,name',
            'category_id'=>'required',
            'purchase_price'=>'required',
            'sale_price'=>'required',
            'stock'=>'required',
        ];
    }
}
