<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWasteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return in_array($this->user()?->role, ['admin', 'petugas'], true);
    }
    public function rules(): array
    {
        return ['waste_category_id' => ['required', 'exists:waste_categories,id'], 'name' => ['required', 'string', 'max:100'], 'price_per_kg' => ['required', 'numeric', 'min:0'], 'stock_kg' => ['nullable', 'numeric', 'min:0'], 'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'], 'is_active' => ['nullable', 'boolean']];
    }
}
