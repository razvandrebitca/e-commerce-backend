<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
 'star', 'review','product_id','user_id'
    ];
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
    use HasFactory;
}
