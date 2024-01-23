<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class DetailOrder extends Model
{
    use HasFactory;
    public function detailorder()
    {
        return $this->belongsTo(detail_orders::class,'order_id', 'product_id');
    }
}
