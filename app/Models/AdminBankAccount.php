<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_type',
        'account_no',
        'account_name',
        'y_tube_link',
    ];
}
