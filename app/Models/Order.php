<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // public function order()
    // {
    //     return $this->belongsTo(order::class, 'status_payment_id');
    // }
    protected $guarded = [];
    
    public function order_detail()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
