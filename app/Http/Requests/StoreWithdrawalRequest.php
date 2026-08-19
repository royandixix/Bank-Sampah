<?php
namespace App\Http\Requests; use Illuminate\Foundation\Http\FormRequest;
class StoreWithdrawalRequest extends FormRequest {public function authorize():bool{return $this->user()?->role==='nasabah';} public function rules():array{return ['amount'=>['required','numeric','min:1000'],'notes'=>['nullable','string','max:500']];}}
