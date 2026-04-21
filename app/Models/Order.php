<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'name',
    'phone',
    'address',
    'total',
    'payment',
    'payment_status',
    'status'
];
}
