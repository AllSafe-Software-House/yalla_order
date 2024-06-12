<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryAdminRequest extends FormRequest
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
        $categoryId = $this->route('categoryupdate');
        return [
            // 'place_id' => ["required","integer","exists:places,id"],
            
            'name' => ["required","string","max:255",Rule::unique('categories')->ignore($this->id, 'id')],
            'logo' => ["nullable"]
        ];
    }
}
