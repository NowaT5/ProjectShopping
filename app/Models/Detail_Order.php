<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Order extends Model
{
    use HasFactory;
    public function order_detail()
    {
        return $this->belongsTo(order_detail::class);
    }
}
