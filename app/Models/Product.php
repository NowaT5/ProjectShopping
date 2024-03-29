<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(product::class,'product_type_id');
    }
    protected $fillable = ['product_name', 'product_price', 'product_image', 'product_stock', 'type_id', 'product_type_id'];

}
