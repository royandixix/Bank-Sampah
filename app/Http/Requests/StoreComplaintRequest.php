<?php
namespace App\Http\Requests; use Illuminate\Foundation\Http\FormRequest;
class StoreComplaintRequest extends FormRequest {public function authorize():bool{return $this->user()?->role==='nasabah';} public function rules():array{return ['subject'=>['required','string','max:150'],'message'=>['required','string','max:1500'],'attachment'=>['nullable','file','mimes:jpg,jpeg,png,pdf','max:2048']];}}
