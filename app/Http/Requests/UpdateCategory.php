<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->can('update')) {
            return true;
        }
		
		return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_uuid' => 'required|uuid',
            'category_name' => 'required|max:255',
            'category_icon' => 'required|string|max:255',
            'category_color' => 'required|string|max:255',
            'category_description' => 'string|nullable',
        ];
    }
}
