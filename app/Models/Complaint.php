<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\SoftDeletes;
class Complaint extends Model {use SoftDeletes; protected $fillable=['customer_id','subject','message','attachment','status','response']; public function customer(){return $this->belongsTo(User::class,'customer_id');} public function histories(){return $this->hasMany(ComplaintStatusHistory::class);} }
