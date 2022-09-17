<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'created_by',
        'inst_id',
        'amount',
        'interest_rate',
        'due_date',
        'status',
        'overdue',
        'overdue_interest_rate',
        'guarantor_name',
        'guarantor_phone',
        'repayment_date',
        'tenure',
    ];
}
