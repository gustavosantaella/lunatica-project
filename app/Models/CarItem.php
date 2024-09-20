<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarItem extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'product_id', 'quantity'];


    public function car()
    {
        return $this->belongsTo(Car::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
