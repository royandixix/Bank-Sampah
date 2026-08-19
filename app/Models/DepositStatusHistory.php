<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class DepositStatusHistory extends Model {protected $fillable=['deposit_id','from_status','to_status','changed_by','notes']; public function changer(){return $this->belongsTo(User::class,'changed_by');} }
