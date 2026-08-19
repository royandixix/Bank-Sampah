<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class ComplaintStatusHistory extends Model {protected $fillable=['complaint_id','from_status','to_status','changed_by','notes'];}
