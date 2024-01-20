<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_payment extends Model
{
    use HasFactory;
    public function status()
    {
        return $this->belongsTo(status_payment::class);
    }
}
