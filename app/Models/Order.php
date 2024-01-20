<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(order::class);
    }
    protected $fillable=[
        'status_payment_id'
    ];
}
