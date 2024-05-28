<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalBalance extends Model
{
    use HasFactory;

    protected $table = 'total_balances';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'total_balance',
        'created_at',
        'updated_at',
    ];
}
