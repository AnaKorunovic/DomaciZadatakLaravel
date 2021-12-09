<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    
    protected $fillable = [
        'brand_id','name', 'slug', 'description','price','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

     
    
}
