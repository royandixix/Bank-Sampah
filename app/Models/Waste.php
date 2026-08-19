<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\SoftDeletes;
class Waste extends Model {use SoftDeletes; protected $fillable=['waste_category_id','name','price_per_kg','stock_kg','image','is_active']; protected function casts():array{return ['price_per_kg'=>'decimal:2','stock_kg'=>'decimal:2','is_active'=>'boolean'];} public function category(){return $this->belongsTo(WasteCategory::class,'waste_category_id');} }
