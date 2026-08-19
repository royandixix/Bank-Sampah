<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class DepositDetail extends Model {protected $fillable=['deposit_id','waste_id','weight_kg','price_per_kg','subtotal']; protected function casts():array{return ['weight_kg'=>'decimal:2','price_per_kg'=>'decimal:2','subtotal'=>'decimal:2'];} public function deposit(){return $this->belongsTo(Deposit::class);} public function waste(){return $this->belongsTo(Waste::class);} }
