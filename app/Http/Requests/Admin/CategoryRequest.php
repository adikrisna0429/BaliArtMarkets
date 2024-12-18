<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
        switch($this->method()){
            case "POST":
            return [
                'name' => ['required', 'unique:categories'],
                'category_id' => 'nullable'
        ];
        case "PUT":
        case "PATCH":
            return [
                'name' => ['required', 'unique:categories,name,' . $this->route()->category->id],
                'category_id' => 'nullable'
            ];
            default: break;
        }
    }
}
