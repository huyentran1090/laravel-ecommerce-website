<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => substr($this->nameAuthor,6),
        ]);
    }
    public function rules()
    {
        $regex = 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/';
        return [
            
            'name' => ['required', $regex],
            
        ];
    }
}
