<?php
namespace App\Http\Requests; use Illuminate\Foundation\Http\FormRequest;
class StoreDepositRequest extends FormRequest {public function authorize():bool{return in_array($this->user()?->role,['admin','petugas'],true);} public function rules():array{return ['customer_id'=>['required','exists:users,id'],'deposit_date'=>['required','date','before_or_equal:today'],'notes'=>['nullable','string','max:1000'],'items'=>['required','array','min:1'],'items.*.waste_id'=>['required','exists:wastes,id'],'items.*.weight_kg'=>['required','numeric','gt:0']];}}
