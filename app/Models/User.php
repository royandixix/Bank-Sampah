<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable {
 use HasFactory,Notifiable,SoftDeletes;
 protected $fillable=['name','email','password','role','phone','address','is_active']; protected $hidden=['password','remember_token'];
 protected function casts():array{return ['email_verified_at'=>'datetime','password'=>'hashed','is_active'=>'boolean'];}
 public function deposits(){return $this->hasMany(Deposit::class,'customer_id');}
 public function withdrawals(){return $this->hasMany(Withdrawal::class,'customer_id');}
 public function ledgers(){return $this->hasMany(AccountLedger::class,'customer_id');}
 public function balance():float{return (float)$this->ledgers()->sum('amount');}
}