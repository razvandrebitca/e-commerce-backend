<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Product extends Model
{
    protected $fillable = [
    'name', 'detail', 'stock','price','discount'
 ];
 public function reviews()
 {
    return $this->hasMany(Review::class);
 }
    use HasFactory, HasApiTokens;
}
