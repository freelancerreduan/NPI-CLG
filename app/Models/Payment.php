<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_method_id',
        'amount',
        'send_from_number',
        'transaction_id',
        'screenshoot',
        'status',
    ];
}
