<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Employee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function employee()
    {
        return $this->belongsTo(employee::class, 'employee_id');
    }
    protected $hidden = [
        'password'
    ];
    protected $table = 'employees' ;
    protected $fillable = [
        'fname',
        'lname',
        'age',
        'gender',
        'username',
        'password',
        'phone',
        'emtype_id'
    ];
}
