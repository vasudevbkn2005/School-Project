<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamName extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class, 'exam_name_id');
    }
}
