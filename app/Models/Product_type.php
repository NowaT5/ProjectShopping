<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    use HasFactory;
    public function product_type()
    {
        return $this->belongsTo(product_type::class, 'product_types');
    }
    // public function type()
    // {
    //     return $this->belongsTo(Type::class, 'type_id');
    // }
}
