<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'final_price',
        'due_date',
        'discount',
        'total_amount',
        'description',
        'due_fees'
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
