<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'txn_id',
        'client_id',
        'cashier_id',
        'inst_id',
        'loan_id'
    ];
}
