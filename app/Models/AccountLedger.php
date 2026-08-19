<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class AccountLedger extends Model {protected $fillable=['customer_id','type','reference_type','reference_id','amount','description']; protected function casts():array{return ['amount'=>'decimal:2'];} public function customer(){return $this->belongsTo(User::class,'customer_id');} }
