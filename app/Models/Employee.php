<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // public function employee()
    // {
    //     return $this->belongsTo(employee::class, 'emtype_id');
    // }
    protected $table = 'employee' ;
    protected $fillable = [
        'fname',
        'lname',
        'username',
        'password',
        'phone',
        'age',
        'gender',
        'emtype_id',
    ];
}
