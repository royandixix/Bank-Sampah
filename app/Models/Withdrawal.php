<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\SoftDeletes;
class Withdrawal extends Model {use SoftDeletes; protected $fillable=['code','customer_id','processed_by','amount','status','payment_proof','notes']; protected function casts():array{return ['amount'=>'decimal:2'];} public function customer(){return $this->belongsTo(User::class,'customer_id');} public function processor(){return $this->belongsTo(User::class,'processed_by');} public function histories(){return $this->hasMany(WithdrawalStatusHistory::class);} }
