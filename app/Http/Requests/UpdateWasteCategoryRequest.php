<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWasteCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->role === 'admin';
    }
    public function rules(): array
    {
        return ['name' => ['required', 'string', 'max:100', Rule::unique('waste_categories', 'name')->ignore($this->route('category')?->id)], 'description' => ['nullable', 'string', 'max:500']];
    }
}
