<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_name_id',
        'type_id',
        'start_date',
        'end_date',
        'class_id',
        'description'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function name()
    {
        return $this->belongsTo(ExamName::class, 'exam_name_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
