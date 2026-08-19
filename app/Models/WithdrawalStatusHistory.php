<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class WithdrawalStatusHistory extends Model {protected $fillable=['withdrawal_id','from_status','to_status','changed_by','notes']; public function changer(){return $this->belongsTo(User::class,'changed_by');} }
