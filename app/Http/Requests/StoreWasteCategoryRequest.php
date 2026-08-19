<?php
namespace App\Http\Requests; use Illuminate\Foundation\Http\FormRequest;
class StoreWasteCategoryRequest extends FormRequest {public function authorize():bool{return $this->user()?->role==='admin';} public function rules():array{return ['name'=>['required','string','max:100','unique:waste_categories,name'],'description'=>['nullable','string','max:500']];}}
