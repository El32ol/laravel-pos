<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationRuleParser;

class CategoryRequest extends FormRequest
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
        {
            
            
            return [
                'ar.name' => 'required|string|unique:category_translations,name,except,category_id',
                'en.name' => 'required|string|unique:category_translations,name,except,category_id',
                // 'ar.name' => ['required', Rule::unique('category_translations' ,'name')->ignore($category->id, 'category_id')],
                // 'en.name' => ['required', Rule::unique('category_translations','name')->ignore($category->id, 'category_id')],
            ];
        
            }
        }
        }
