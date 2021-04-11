<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            'title_fa' => 'required|unique:categories,title_fa',
            'title_en' => 'nullable|unique:categories,title_en',
        ];
    }

   /* public function messages()
    {
        return [
          'title_fa.required' => 'فیلد دسته بندی فارسی نمیتواند خالی باشد'
        ];
    }*/

}
